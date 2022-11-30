@extends('admin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<!-- Button trigger modal -->
<a class="btn btn-outline-primary" data-toggle="modal" data-target="#addservice">
    <i class="fas fa-plus"></i> Add New Employee
</a>
<p></p>
<table class="table" id="usertable">
    <thead>
      <tr>
         <th scope="col">SL.</th>
         <th scope="col">Service Image</th>
         <th scope="col">Service Name</th>
         <th scope="col">Service Category</th>
         <th scope="col">Service Price</th>
         <th scope="col">Service Time</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
{{-- @foreach ($service as $key=> $item)
<tr>
    <td> {{$service->firstItem()+$key}} </td>
    <td><img src="{{url('/admin/images/service/')}}/{{$item->s_image}}" style="height:50px; width:50px;"></td>
    <td> {{$item->s_name}} </td>
    <td> {{$item->s_category}} </td>
    <td> {{$item->s_price}} </td>
    <td> {{$item->s_time}} </td>
    <td><input type="checkbox" class="toggle-class" data-id="{{ $item->id }}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{ $item->status==true ? 'checked' : '' }}></td>
    <td>

        <a data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></a> --}}

        {{-- <a href="{{ url('delete', $item->id) }}"><i class="fa fa-trash"></i></a> --}}
        {{-- <form action="{{ url('delete', $item->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <a><i class="fa fa-trash"></i></a>
            </form> --}}

    </td>
</tr>
{{-- @endforeach --}}
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
          {{-- @foreach ($location as $key=> $item) --}}
          <form action="{{url('admin/addemployee')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="form-group">
                <input type="file" class="form-control-file" name="avatar">
           </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <select class="form-control" name="urole">
                <option value="employee">Employee</option>
                <option value="admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Re-type Password">
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


    {{-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @foreach ($location as $key=> $item)
            <form action="{{url('admin/service/edit_location')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" name="city" value="{{ $item->city }}" placeholder="City">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="state" value="{{ $item->state }}" placeholder="State">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="country" value="{{ $item->country }}" placeholder="Country">
            </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
          </form>
          @endforeach
          </div>
        </div>
      </div>
</div> --}}
@endsection
@section('footer_js')
<script>
    $(document).ready( function () {
    $('#usertable').DataTable();
});
</script>

@endsection
