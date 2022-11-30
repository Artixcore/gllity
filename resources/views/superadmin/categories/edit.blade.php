@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<div class="card">
    <div class="col-md-12 mt-2">
        <a href="{{ url('superadmin/categories') }}" class="btn btn-outline-success"> BACK </a>
    </div>
    @foreach ($category as $item)
        <form action="{{url('categories/update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
          <div class="form-group">
            <img src="{{url('public/admin/images/category')}}/{{$item->cat_image}}" style="height: 150px; width: 150px;"><br/>
            <input type="file" class="form-control-file" value="{{$item->cat_image}}" name="cat_image">
          </div>
            <div class="form-group">
            <input type="text" class="form-control" name="cat_name" value="{{ $item->cat_name }}" placeholder="Category Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="cat_slug" value="{{ $item->cat_slug }}" placeholder="Category Slug">
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
@endsection
