@extends('layouts.profile')

@section('style_css')
<style>
      .sh{
    /* border-radius: 25px; */

    box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -webkit-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -moz-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
  }
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #ffffff;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="main-body sh">

          <div class="row gutters-sm">
            <div class="col-md-3 mb-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('new-booking') }}">Book Now</a></li>
                    <li class="list-group-item"><a href="{{ url('viewshop') }}">Start Your Business With US</a></li>
                </ul>
            </div>
            <div class="col-md-9">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-header"><h2><b>Get Appointment</b></h2>
                        @if(session()->has('message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" action="{{ url('new-inquery') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Your Name<span>*</span></label>
                                            <input name="customer_name" type="text" class="form-control" placeholder="Your Name" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Your Email<span>*</span></label>
                                            <input name="customer_email" class="form-control" type="text" placeholder="Your Email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Your Phone<span>*</span></label>
                                            <input name="customer_phone" class="form-control" type="text" placeholder="Your Phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label>Select Date<span>*</span></label>
                                        <input type="date" name="service_date" class="form-control date" placeholder="Service Date"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Select Service Category<span>*</span></label>
                                            <select class="form-control" name="cat_name">
                                            @foreach (App\Service_Category::all() as $service)
                                                <option value="{{ $service->cat_name }}"> {{ $service->cat_name }} </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Select Service<span>*</span></label>
                                    <input type="text" name="s_name" class="form-control" id="country_name" placeholder="Service"/>
                                    <div id="countryList">
                                    </div>
                                    </div>
                                    {{ csrf_field() }}
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Message<span>*</span></label>
                                            <textarea name="message" class="form-control" placeholder=""></textarea>
                                    </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn btn-outline-success">Inquery</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
        </div>

@endsection
@section('footer_js')

<script>
    $(document).ready(function(){

     $('#country_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#countryList').fadeIn();
                        $('#countryList').html(data);
              }
             });
            }
        });

        $(document).on('click', 'li', function(){
            $('#country_name').val($(this).text());
            $('#countryList').fadeOut();
        });

    });
    </script>

@endsection
