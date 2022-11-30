@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<!-- Button trigger modal -->
<a class="btn btn-outline-primary" data-toggle="modal" data-target="#addservice">
    <i class="fas fa-plus"></i> Add New Service
</a>
<p></p>
<table class="table" id="usertable">
    <thead>
      <tr>
         <th scope="col">SL.</th>
         <th scope="col">Slide Image</th>
         <th scope="col">Slide Title</th>
         <th scope="col">Slide Desc</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        @php
            $slide = App\Slide::paginate();
        @endphp

@foreach ($slide as $key=> $item)
<tr>
    <td> {{$slide->firstItem()+$key}} </td>
    <td><img src="{{url('public/admin/images/slides/')}}/{{$item->slide}}" style="height:50px; width:50px;"></td>
    <td> {{$item->slide_title}} </td>
    <td> {{$item->slide_text}} </td>
    <td><input type="checkbox" class="toggle-class" data-id="{{ $item->id }}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{ $item->status==true ? 'checked' : '' }}></td>
    <td>

        <a class="btn btn-ouline-success" href="{{ url('superadmin/slide/edit', $item->slide_token) }}"><i class="fa fa-edit"></i></a>

        <form action="{{url('superadmin/slide/deleteslide',[$item->id])}}" method="POST">
            @method('POST')
            @csrf
            <button type="submit"><i class="fa fa-trash"></i></button>
        </form>

    </td>
</tr>
@endforeach
    </tbody>
  </table>

</div>
    <!-- Modal -->
    <div class="modal fade" id="addservice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form action="{{url('superadmin/slide/add')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="form-group">
            <input type="file" class="form-control-file" name="slide">
           </div>
          <div class="form-group">
            <input type="text" class="form-control" name="slide_title" placeholder="Slide Title">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="slide_text" placeholder="Slide Text">
          </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
        </form>
        {{-- @endforeach --}}
        </div>
      </div>
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
