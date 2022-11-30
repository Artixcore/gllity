@extends('layouts.app')

@section('style_css')
<style>
.zoom {
  transition: transform .2s; Animation
}
.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
    a:hover{
        font-size: 24px;
    }
.carousel-item {
    /* width: 50%; */
  height: 50vh;
  min-height: 100px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover
  }

  .sh{
    border-radius: 25px;
    box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -webkit-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -moz-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
  }
</style>
@endsection
@section('content')


	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-12 col-12">
							<div class="form-main">
						
                                            <div class="row py-5">
                                                
                                                @php
                                                
                                                $services = DB::select('select * from users where company_name = company_name');
                                                
                                                @endphp
                                                
        @foreach ($services as $service)

            <div class="col-sm-3 mb-4">
                <div class="card sh shadow-custom bg-dark zoom text-white">
                    <img style="height: 200px; width:300px; border-radius: 25px;" src="{{url('/public/superadmin/images/shop/')}}/{{$service->company_logo}}">
                     {{-- style="height: 100px; width: 100px;"> --}}
                    <div class="card-img-overlay">
                      <a href="{{url('ser', $service->id)}}"><h5 class="card-title">{{$service->company_name}}</h5></a>
                    </div>
                </div>
            </div>

        @endforeach
        </div>
  
                                 
							</div>
						</div>
						
						
					
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->


@endsection
