<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{

    function AddToCart(Service $service){


        \Cart::session(auth()->id())->add(array(
            'id' => $service->id,
            'name' => $service->s_name,
            'price' => $service->s_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $service,
        ));

        return view('cart');

    }

    function index(){

        $cart = \Cart::session(auth()->id())->getContent();
        // return view('cart', compact('cart'));
        return view('cart');
    }

    function deleteItem($itemId){

        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }

    function updateItem($rowId){

        \Cart::session(auth()->id())->update($rowId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);

        return back();
    }


    function checkout(){
        // $cartitem = \Cart::session(auth()->id())->getContent();
        return view('checkout');
    }

    // function store(){

    // }

}
