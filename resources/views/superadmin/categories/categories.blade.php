@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<!-- Button trigger modal -->
<a class="btn btn-outline-primary" data-toggle="modal" data-target="#addcategories">
    <i class="fas fa-plus"></i> Add New Category
</a>
<p></p>
<table class="table" id="usertable">
    <thead>
      <tr>
         <th scope="col">SL.</th>
         <th scope="col">category Name</th>
         <th scope="col">Category Slug</th>
         <th scope="col">Image</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
@foreach ($category as $key=> $item)
<tr>
    <td> {{$category->firstItem()+$key}} </td>
    <td> {{$item->cat_name}} </td>
    <td> {{$item->cat_slug}} </td>
    <td><img src="{{url('public/admin/images/category')}}/{{$item->cat_image}}" style="height: 80px; width: 80px;"></td>
    <td>

        <a href="{{ url('superadmin/categories/edit',[$item->cat_slug]) }}"><i class="fa fa-edit"></i></a>
    </td>
    <td>
        <form action="{{url('delete',[$item->id])}}" method="POST">
            @method('POST')
            @csrf
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-trash"></i></button>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{url('superadmin/categories/post')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
          <div class="form-group">
            <input type="file" class="form-control-file" name="cat_image">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="cat_name" name="cat_name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="cat_slug" id="cat_slug">
          </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="updatecategories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @foreach ($category  as $key=> $item)
            <form action="{{url('edit')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">

            <div class="form-group">
              <input type="file" class="form-control-file" name="cat_image">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{$item->cat_name}}">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cat_slug" id="cat_slug" value="{{$item->cat_slug}}">
            </div>
            @endforeach
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-primary">Update</button>
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

    $('#cat_name').keyup(function() {
        $('#cat_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    });
});
</script>

@endsection

@section('footer_js')
<script>
    $(document).ready(function (){
    $('#cat_name').keyup(function() {
        $('#cat_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    });
});
</script>
@endsection
