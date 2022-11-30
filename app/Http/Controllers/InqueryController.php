<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Inquery;
use App\User;

class InqueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function new_inquery(Request $request){

        $inquery = new Inquery();

        $inquery->inquery_id =  'IN'.Auth::user()->name.rand(1,5550);
        $inquery->customer_name = $request->customer_name;
        $inquery->customer_email = $request->customer_email;
        $inquery->customer_phone = $request->customer_phone;
        $inquery->s_name = $request->s_name;
        $inquery->cat_name = $request->cat_name;
        $inquery->service_date = $request->service_date;
        $inquery->message = $request->message;

        $request->user()->inquery()->save($inquery);

        return back()->with('success', true);
    }

    function view_inqery(){
        $orders = Inquery::where('user_id', auth()->id())->get();
        return view('admin.booking.inquery', compact('orders'));
    }
}

