<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Formation;
use App\Models\Order;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Usernotnull\Toast\Concerns\WireToast;

class StripeController extends Controller
{
    use WireToast;

    public function checkout(Formation $formation) {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => number_format($formation->price * 100, 0, '', ''),
                    'product_data' => [
                        'name' => $formation->title,
                        // 'images' => storage_path('app/public/' . $formation->img_name),
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success', [], true). "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('formations'),
        ]);

        $order = new Order();
        $order->session_id = $session->id;
        $order->formation_id = $formation->id;
        $order->user_id = auth()->user()->id;
        $order->status = 'unpaid';
        $order->save();

        return redirect($session->url);
    }

    public function success(Request $request) {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }
            Mail::to(auth()->user()->email)->send(new OrderMail());

            return view('checkout-success');
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

        return view('checkout');
    }

    public function handleWebhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }
 
        // Handle the event
         switch ($event->type) {
             case 'checkout.session.completed':
                 $session = $event->data->object;
 
                 $order = Order::where('session_id', $session->id)->first();
                 if ($order && $order->status === 'unpaid') {
                     $order->status = 'paid';
                     $order->save();
                 }
 
             // ... handle other event types
             default:
                 echo 'Received unknown event type ' . $event->type;
         }
 
         return response('ok');
    }
}
