<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Translator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $orders = Order::all();

        return view('admin.dashboard', [
            'orderCountLastMounth' => $orders->where('created_at', '>=', Carbon::now()->subMonth())->count(),
            'orderMountLastMounth' => $orders->where('created_at', '>=', Carbon::now()->subMonth())->sum('amount'),
            'orderCountTotal' => $orders->count(),
            'orderMountTotal' => $orders->sum('amount'),
        ]);
    }
}
