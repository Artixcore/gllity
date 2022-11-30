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

    <div class="row">
        @include('fontend.edit')
      <div class="col-7">
        <div class="card sha">
            @foreach ($user as $users)
            <div class="card-body">
                <form action="{{ url('edit', $users->id) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" name="phone" value="{{ $users->phone }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" value="{{ $users->email }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                          <input type="submit" value="Save" class="btn btn-outline-success">
                        </div>
                    </div>
                  </form>
                  @endforeach
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

        // $('#upload_cover_form').submit(function(e) {
        //     e.preventDefault();

        //     var formData = new FormData(this);

        //     $.ajax({
        //         type:'POST',
        //         url: "{{ url('update-cover')}}",
        //         data: formData,
        //         cache:false,
        //         contentType: false,
        //         processData: false,
        //         success: (data) => {
        //             this.reset();
        //             alert('Cover has been uploaded successfully');
        //         },
        //         error: function(data){
        //             console.log(data);
        //         }
        //     });
        // });
    });

</script>
@endsection
