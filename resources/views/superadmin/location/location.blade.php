@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<!-- Button trigger modal -->
<a class="btn btn-outline-primary" data-toggle="modal" data-target="#addcategories">
    <i class="fas fa-plus"></i> Add New Location
</a>
<p></p>
<table class="table" id="usertable">
    <thead>
      <tr>
         <th scope="col">SL.</th>
         <th scope="col">City</th>
         <th scope="col">State</th>
         <th scope="col">Country</th>
        <th scope="col">Edit</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
@foreach ($location as $key=> $item)
<tr>
    <td> {{$location->firstItem()+$key}} </td>
    <td> {{$item->city}} </td>
    <td> {{$item->state}} </td>
    <td> {{$item->country}} </td>
    <td> <a href="{{ url('superadmin/service/editlocation', $item->id) }}"><i class="fa fa-edit"></i></a> </td>
    <td>
        <form action="{{url('superadmin/location/delete', $item->id)}}" method="POST">
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
    <div class="modal fade" id="addcategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{url('superadmin/service/add-location')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="city" placeholder="City">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="state" placeholder="State">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="country" placeholder="Country">
          </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
        </form>

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
