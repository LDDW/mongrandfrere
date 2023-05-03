<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Translator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index() 
    {
        return view('admin.dashboard', [
            'orderCountLastMounth' => Order::where('created_at', '>=', Carbon::now()->subMonth())->count(),
            'orderMountLastMounth' => Order::where('created_at', '>=', Carbon::now()->subMonth())->with('formation')->get()->pluck('formation')->pluck('price')->sum(),
            'orderCountTotal' => Order::count(),
            'orderMountTotal' => Order::with('formation')->get()->pluck('formation')->pluck('price')->sum(),
        ]);
    }
}
