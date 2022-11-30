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
        @include('foontend.edit')
      <div class="col-7">
        <div class="card sha">
        <div class="card-body">

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
