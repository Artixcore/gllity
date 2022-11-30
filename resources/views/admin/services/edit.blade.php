@extends('admin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
    </div>
<!-- Button trigger modal -->
<div class="col-md-8">
<div class="card">
    <div class="card-header"> <a class="btn btn-outline-success" href="{{ url('admin/service/view') }}"> Back </a> Edit Services </div>
    <div class="card-body">
        @foreach ($service as $item)

<form method="post" action="{{ url('public/admin/service/update', $item->id) }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12 text-center">
            <img src="{{url('public/admin/images/service/')}}/{{$item->s_image}}" style="height:150px; width:150px;">
            <input type="file" value="{{ $item->s_image }}" class="form-control-file" name="s_image">
        </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Service Name</label>
        <input id="s_name" placeholder="Service Name" value="{{ $item->s_name }}" name="s_name" type="text" class="form-control">
      </div>
      <div class="form-group col-md-6">
        <label>Service Slug</label>
        <input id="s_slug" placeholder="Service Slug" name="s_slug" value="{{ $item->s_slug }}" type="text" class="form-control">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label>Timing</label>
          <input name="s_timing" type="text" value="{{ $item->s_timing }}" placeholder="Service Timing" class="form-control">
        </div>
        <div class="form-group col-md-6">
          <label>Service Price</label>
          <input name="s_price" placeholder="Service Price" value="{{ $item->s_price }}" type="text" class="form-control">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
          <label>Service Category</label>
          <select name="s_category" class="form-control">
          @foreach (App\Service_Category::all() as $category)
           <option selected>{{ $item->s_category }}</option>
           <option value="{{ $category->s_category }}"> {{ $category->s_category }}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Service Location</label>
          <select name="s_location" class="form-control">
            @foreach (App\Location::all() as $location)
               <option selected> {{ $item->s_location }} </option>
               <option value="{{$location->city}} | {{$location->state}} | {{$location->country}}"> {{$location->city}} | {{$location->state}} | {{$location->country}} </option>
            @endforeach
          </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Service Descreption</label>
            <textarea type="text" placeholder="Service Descerption" class="form-control" name="s_desc">{{ $item->s_desc }}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>

  @endforeach
</div>
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
    $('#s_name').keyup(function() {
    $('#s_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
    });
</script>
@endsection
