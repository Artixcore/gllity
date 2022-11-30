<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service;
use App\User;

class ServiceController extends Controller
{
    function index(){

        $service = Service::where('user_id', auth()->id())->get();
        return view('admin.services.service', compact('service'));
    }

    function viewbookings(){
        $orders = Order::where('user_id', auth()->id())->get();
        return view('admin.booking.booking', compact('orders'));
    }

    function order_number($order_number){

        $invoices = Order::where('order_number', $order_number)->get();
        return view('admin.booking.invoice', compact('invoices'));
    }
}
