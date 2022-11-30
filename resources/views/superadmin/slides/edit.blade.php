@extends('superadmin.master')

@section('content')
<div class="container py-4">
<div class="col-md-12">
    @foreach ($slide as $item)
    <form action="{{url('superadmin/slide/update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <img src="{{url('public/admin/images/slides/')}}/{{$item->slide}}" style="height: 150px; width: 150px;" class="img-rounded"><br/>
            <input type="file" class="form-control-file" name="slide">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Slide Title</label>
          <input type="text" name="slide_title" value="{{ $item->slide_title }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Slide Text</label>
          <input type="text" name="slide_text" value="{{ $item->slide_text }}" placeholder="Slide Text" class="form-control">
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Update</button>
      </form>

</div>
</div>
@endsection
@section('footer_js')
<script>
    $(document).ready( function () {
    $('#usertable').DataTable();
});
</script>
@endsection
