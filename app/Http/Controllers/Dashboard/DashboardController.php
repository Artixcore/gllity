<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;

class DashboardController extends Controller
{
    function admin_dash(){

        $orders = Order::where('user_id', auth()->id())->get();
        return view('admin.dashboard.admin', compact('orders'));
    }
}
