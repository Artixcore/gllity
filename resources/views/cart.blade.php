@extends('layouts.app')
@section('style_css')

@endsection
@section('content')


{{-- {{ dd(\Cart::session(auth()->id())->getContent()) }} --}}

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								{{-- <th>PRODUCT</th> --}}
								<th>NAME</th>
								<th>UNIT PRICE</th>
								<th>QUANTITY</th>
								<th>TOTAL</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
                        @php
                            $cart = \Cart::session(auth()->id())->getContent();
                        @endphp
						<tbody>
                           @foreach ($cart as $item)

                          	<tr>
								{{-- <td class="image" data-title="No"><img src="{{url('public/admin/images/service')}}/{{$item->s_image}}" alt="#"></td> --}}
								<td>
									<p class="product-name"><a href="#">{{ $item->name }}</a></p>
									<p class="product-des">bus.</p>
								</td>
								<td><span>
                                    {{ $item->price }}
                                </span>
                                </td>
                              	<td class="text-center"><!-- Input Order -->
                                    <form action="{{ route('cart.update', $item->id) }}">
                                        {{-- @csrf --}}
									<div class="input-group">
										
										<input type="text" name="quantity" class="input-number read-only" style="width: 50px;" disabled data-min="0" data-max="100" value="{{ $item->quantity }}">
									  
									</div>
									<!--/ End Input Order -->
                                    </form>
								</td>
								<td class="total-amount" data-title="Total"><span>{{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}</span></td>
								<td class="action" data-title="Remove"><a href="{{ route('cart.delete', $item->id) }}"><i class="ti-trash remove-icon"></i></a></td>
							</tr>
                            @endforeach

						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span>${{ \Cart::session(auth()->id())->getSubTotal() }}</span></li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li>
										<li class="last">Total<span>${{ \Cart::session(auth()->id())->getTotal() }}</span></li>
									</ul>
									<div class="button5">
										<a href="{{ route('checkout') }}" class="btn">Checkout</a>
										<a href="{{url('category')}}" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
                    {{-- @endforeach --}}
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->


        @endsection
@section('footer_js')
{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>


<script>
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	function AddToCart(id){
		var url = "{{ url('/') }}";
		$.post( url+"/cart/",
			{
				id: id
			})
		  .done(function( data ) {
		  	data = JSON.parse(data);
		    if(data.status == 'success'){
		    	// toast
		    	alertify.set('notifier','position', 'top-center');
				alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ url('cart') }}">go to checkout page</a>');

		    	$("#totalItems").html(data.totalItems);
		    }
		  });
	}
</script>

@endsection
