@extends('admin.master')

@section('content')
<div class="container py-4">
    <div class="row">
    <div class="col-md-6">

        <div class="container">
@php
    $services = App\Service::where('user_id', auth()->id())->get();
@endphp
        <div class="row py-5">
            @foreach ($services as $item)

            <div class="col-sm-3 mb-4">
            <div class="card" style="width: 10rem;">
                <img src="{{url('public/admin/images/service')}}/{{$item->s_image}}" style="height: 150px;" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$item->s_name}}</h5>
                  <p class="card-text">{{$item->s_price}}</p>
                  <a title="Add to cart" href="{{ route('admin.add', $item->id) }}">+ Add to cart</a>
                </div>
              </div>
              </div>

            @endforeach
        </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> POS </div>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data" action="{{ url('post-pos') }}">
                    @csrf
                <div class="form-group">
                 <input type="text" name="pos_customer_fullname" placeholder="Customer Full Name" class="form-control">
                </div>
                <div class="form-group">
                <div class="input-group">
                    <input type="phone" name="pos_customer_phone" placeholder="Phone Numer" class="form-control">
                    <input type="email" name="pos_customer_email" placeholder="Customer Email" class="form-control">
                </div>
                </div>
                <div class="form-group">
                    <textarea type="text" name="pos_customer_address" placeholder="Address" class="form-control"></textarea>
                </div>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Service Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @php
                        $cart = \Cart::session(auth()->id())->getContent();
                    @endphp
                    <tbody>
                       @foreach ($cart as $item)

                          <tr>
                            {{-- <td class="image" data-title="No"><img src="{{url('/admin/images/service/')}}/{{$item->s_image}}" alt="#"></td> --}}
                            <td>
                                <input style="width: 120px;" name="pos_name" value="{{ $item->name }}" multiple>
                            </td>
                            <td><span>
                                <input style="width: 80px;" name="pos_price" value="{{ $item->price }}" multiple>
                            </span>
                            </td>
                              <td class="text-center"><!-- Input Order -->
                                <form action="{{ route('cart.update', $item->id) }}">
                                    {{-- @csrf --}}
                                {{-- <div class="input-group"> --}}
                                    <input type="text" style="width: 80px;" name="pos_quantity" data-min="0" data-max="100" value="{{ $item->quantity }}" multiple>
                                {{-- </div> --}}
                                <!--/ End Input Order -->
                                </form>
                            </td>
                            {{-- <td data-title="Total"><span>{{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</span></td> --}}
                            <td data-title="Remove"><a href="{{ route('cart.delete', $item->id) }}"> <i class="fas fa-times-circle"></i> </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>



                <table class="table">
                    <tbody>
                     <tr>
                        <td> Subtotal </td>
                        <td> <input name="pos_subtotal" value="${{ \Cart::session(auth()->id())->getSubTotal() }}"></td>
                     </tr>
                     <tr>
                         @php
                             $condition = new \Darryldecode\Cart\CartCondition(array(
                               'name' => 'VAT 12.5%',
                               'type' => 'tax',
                               'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                               'value' => '12.5%',
                               'attributes' => array( // attributes field is optional
                               	'description' => 'Value added tax',
                               	'more_data' => 'more data here'
                            )
                           ));
                         @endphp
                        <td>TAX</td>
                        <td><input name="pos_tax" value="12.5% (Fixed)"></td>
                      </tr>
                      <tr>
                        <td>Total</td>
                        <td><input name="pos_total" value="${{ \Cart::session(auth()->id())->getTotal() }}"></td>
                      </tr>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-block btn-outline-success"> Pay </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('footer_js')
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="input-group">  <input type="text" name="field_name[]" class="form-control" value=""/><a href="javascript:void(0);" class="btn btn-outline-secondary remove_button">X</div>'; //New input field html
        // var fieldHTML = '<div><input type="text" name="field_name[]" class="form-control" value=""/><a href="javascript:void(0);" class="remove_button">X</div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
@endsection
