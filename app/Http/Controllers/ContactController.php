<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Usernotnull\Toast\Concerns\WireToast;

class ContactController extends Controller
{

    use WireToast;

    public function index() {
        return view('contact');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'lastname' => 'required|string|min:3|max:255',
            'firstname' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:3',
        ]);
        
        if(isset($request->file)) {
            $request->validate([
                'file' => 'mimes:pdf,doc,docx,odt,png,jpeg,jpg|max:2048',
            ]);

            $request->file->store('contact');            
        }

        $backtrace = debug_backtrace()[0];

        try {
            Mail::to($request->email)->send(new Contact($request->all()));

            // toast succes
            toast()
                ->success('L\'email a été envoyé !', 'Succès')
                ->pushOnNextPage();

            // log success
            Log::info('email contact envoyé', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
            ]);

        } catch (Exception $e) {
            // toast success
            toast()
                ->danger('L\'email n\'a pas été envoyé !', 'Erreur')
                ->pushOnNextPage();

            // log error
            Log::error('email contact pas envoyé', [
                'class' => $backtrace['class'],
                'function' => $backtrace['function'],
                'error' => $e->getMessage(),
            ]);
        }

        return redirect()->route('index');
    }
}
