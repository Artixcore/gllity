@extends('layouts.app')

@section('content')


	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h2>Book Now</h2>
                                    @if(session()->has('message'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session()->get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
								</div>
								<form class="form" method="post" action="{{ url('new-inquery') }}">
                                    @csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Name<span>*</span></label>
												<input name="customer_name" type="text" placeholder="Customer Name">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="customer_email" type="email" placeholder="Customer Email">
                                            </div>
										</div>
                                        <div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone Number<span>*</span></label>
												<input name="customer_phone" type="text" placeholder="Customer Phone">
											</div>
										</div>
                                        <div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Date<span>*</span></label>
												<input name="service_date" type="date" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Service Category<span>*</span></label>
												<input name="cat_name" id="cat_name" type="text" placeholder="">
                                                <div id="List">
                                                </div>
                                                {{ csrf_field() }}
                                            </div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Select Services<span>*</span></label>
												<input name="s_name" id="s_name" type="text" placeholder="">
                                                <div id="List1">
                                                </div>
                                                {{ csrf_field() }}
											</div>
										</div>

                                        <div class="col-lg-12 col-12">
											<div class="form-group">
												<label>Message<span>*</span></label>
												<textarea name="message" type="text" placeholder=""></textarea>
											</div>
										</div>

										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn">Book!</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>+123 456-789-1120</li>
										<li>+522 672-452-1120</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
										<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->

	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
@endsection
@section('footer_js')

<script>
    $(document).ready(function(){

     $('#cat_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#List').fadeIn();
                        $('#List').html(data);
              }
             });
            }
        });

        $(document).on('click', 'li', function(){
            $('#cat_name').val($(this).text());
            $('#List').fadeOut();
        });

    });
    </script>


<script>
    $(document).ready(function(){

     $('#s_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetchservice') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#List1').fadeIn();
                        $('#List1').html(data);
              }
             });
            }
        });

        $(document).on('click', 'li', function(){
            $('#s_name').val($(this).text());
            $('#List1').fadeOut();
        });

    });
    </script>
@endsection
