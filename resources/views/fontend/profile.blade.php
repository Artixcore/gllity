@extends('layouts.profile')

@section('style_css')
<style>
      .sh{
    /* border-radius: 25px; */

    box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -webkit-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -moz-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
  }

</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="card-body sh">

          <div class="row">
            <div class="col-md-4 mb-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('new-booking') }}">Book Now</a></li>
                    <li class="list-group-item"><a href="{{url('viewshop')}}">Start Your Business With US</a></li>
                    <li class="list-group-item">Complete Bookings ()</li>
                    <li class="list-group-item">Pending Bookings  ()</li>
                    <li class="list-group-item">Approved Bookings ()</li>
                    <li class="list-group-item">Walk-in Bookings  ()</li>
                </ul>
            </div>
            <div class="col-md-8">

                  <div class="row">
                    <div class="col-sm-4">
                        <img src="{{url('user')}}/{{ Auth::user()->avatar }}" alt="Admin" id="image_preview_container" style="width: 100%;">
                        <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="javascript:void(0)" >
                            @csrf
                            <div class="row">
                                @auth
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                            {{-- <label class="custom-file-label" for="inputGroupFile01">{{ $errors->first('title') }}</label> --}}
                                            <input type="file" class="form-control-file" name="avatar" placeholder="Choose image" id="image">
                                            </div>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-success" type="submit"> Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </form>
                   <br/>
                    </div>
                    <div class="col-sm-8">
                        <ul class="list-group">
                            <li class="list-group-item"> {{ Auth::user()->name }} </li>
                            <li class="list-group-item"> {{ Auth::user()->email }} </li>
                            <li class="list-group-item"> {{ Auth::user()->phone }} </li>
                        </ul>
                    </div>
                  </div>
            </div>
          </div>

        </div>
        </div>

@endsection
@section('footer_js')

<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#image').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
              $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#upload_image_form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ url('update-ava')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Cover has been uploaded successfully');
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });

</script>

@endsection
