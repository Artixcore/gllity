<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Order;
use App\POS;

class POSController extends Controller
{

    function index(){

        $services = Service::where('user_id', auth()->id())->get();
        // $cart = \Cart::session(auth()->id())->getContent();
        // return view('admin.pos.pos', compact('services', 'cart'));
        return view('admin.pos.pos', compact('services'));

    }


    function pos(Request $request){

        $pos = new POS();
        $pos->pos_customer_fullname = $request->pos_customer_fullname;
        $pos->pos_customer_phone = $request->pos_customer_phone;
        $pos->pos_customer_email = $request->pos_customer_email;
        $pos->pos_customer_address = $request->pos_customer_address;
        $pos->pos_name = $request->pos_name;
        $pos->pos_price = $request->pos_price;
        $pos->pos_quantity = $request->pos_quantity;
        $pos->pos_subtotal = $request->pos_subtotal;
        $pos->pos_tax = $request->pos_tax;
        $pos->pos_total = $request->pos_total;
        $request->user()->pos()->save($pos);

        return back();
    }


    function addToCart(Service $service){

        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $service->id,
            'name' => $service->s_name,
            'price' => $service->s_price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $service,
        ));

        return view('admin.pos.pos');

    }

    function content(){

        $cart = \Cart::session(auth()->id())->getContent();
        // return view('cart', compact('cart'));
        return view('admin.pos.pos', compact('cart'));
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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname' =>'required',
            'shipping_state' =>'required',
            'shipping_city' =>'required',
            'shipping_address' =>'required',
            'shipping_phone' =>'required',
            'shipping_zipcode' =>'required',
            'payment_method' =>'required',
        ]);

    //     if (Input::get('payment_method')) {
    //         $nsfw = true;
    //   } else {
    //         $nsfw = false;
    //   }

        $order = new Order();

        $order->order_number = uniqid('orderNumber-');

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_zipcode = $request->input('shipping_zipcode');
        $order->payment_method = $request->input('payment_method');

            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_zipcode = $request->input('shipping_zipcode');


        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();

        $order->status = 'pending';
        $order->save();

        // Save Order Items

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item){
            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);
        }

        // Payment
        // if(request())

        // Empty Cart
        \Cart::session(auth()->id())->clear();

        // Send Email Customers

        // Take User to Thanks Page

        return back()->with('message', 'Order Completed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
