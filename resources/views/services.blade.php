@extends('layouts.app')
@section('style_css')

@endsection
@section('content')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{url('Services')}}">Category</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
				
					<div class="col-lg-12 col-md-12 col-12">
					
						<div class="row">

                           @foreach ($services as $item)

							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="#">
											<img class="default-img" src="{{url('public/admin/images/service/')}}/{{$item->s_image}}" style="height: 200px;" alt="#">
											<img class="hover-img" src="{{url('public/admin/images/service/')}}/{{$item->s_image}}" style="height: 200px;" alt="#">
										</a>
										<div class="button-head">
											<div class="product-action">
												{{-- <a title="Quick View" href="{{url('singleser')}}/{{ $item->id }}"><i class="ti-eye"></i><span>View</span></a> --}}
												{{-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> --}}
											</div>
											<div class="product-action-2">
												{{-- <a title="View Service" href="{{ url('cart.add', $item->id) }}">+ Add to cart</a> --}}
                                                <a title="View Service" href="{{ url('single', $item->s_slug) }}">View Service</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="{{ url('single', $item->s_slug) }}">{{$item->s_name}}</a></h3>
										<div class="product-price">
											<span>{{$item->s_price}}</span>
										</div>
									</div>
								</div>
							</div>

                            @endforeach

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->

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
