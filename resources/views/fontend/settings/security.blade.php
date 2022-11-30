@extends('layouts.profile')

@section('style_css')
{{-- <style>
    a{
        font-size: 20px;
    }
a:hover{
    font-size:25px;
}
</style> --}}
@endsection

@section('content')
<div class="container py-3">
@foreach ($user as $users)

    <div class="row">
      @include('fontend.edit')
      <div class="col-9">
        <div class="card sha">
            <div class="card-body">
                <form action="{{ url('security') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Old Password</label>
                      <div class="col-sm-10">
                        <input id="oldpassword" type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" placeholder="Old Password" name="oldpassword" required autofocus>

                        @if ($errors->has('oldpassword'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('oldpassword') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                      <div class="col-sm-10">
                        <input id="password" placeholder="New Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Retype New Password</label>
                        <div class="col-sm-10">
                            <input id="password-confirm" placeholder="Retype Password" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success"> Save </button>
                    </div>
                  </form>
            </div>
        </div>
      </div>
    </div>

    @endforeach
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
                    alert('Image has been uploaded successfully');
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#cover').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
              $('#cover_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

    });

</script>
@endsection
