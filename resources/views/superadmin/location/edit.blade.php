@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<div class="card">
    <div class="col-md-12 mt-2">
        <a href="{{ url('superadmin/service/locations') }}" class="btn btn-outline-success"> BACK </a>
    </div>
        @foreach ($location as $item)
        <form action="{{url('superadmin/service/edit_location', $item->id)}}" method="POST">
            @csrf
          <div class="card-body">
            <div class="form-group">
            <input type="text" class="form-control" value="{{$item->city}}" name="city" placeholder="Coupon Code">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="state" value="{{ $item->state }}" placeholder="Start Date">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="country" value="{{ $item->country }}" placeholder="End Date">
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
@section('footer_js')

@endsection
