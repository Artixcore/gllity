@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<div class="card">
    <div class="col-md-12 mt-2">
        <a href="{{ url('superadmin/coupons') }}" class="btn btn-outline-success"> BACK </a>
    </div>
    @foreach ($coupon as $item)
        <form action="{{url('superadmin/coupons/update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">

          <div class="form-group">
            <input type="text" class="form-control" value="{{$item->coupon_code}}" name="coupon_code" placeholder="Coupon Code">
          </div>
            <div class="form-group">
            <input type="date" class="form-control" name="start_date" value="{{ $item->start_date }}" placeholder="Start Date">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="end_date" value="{{ $item->end_date }}" placeholder="End Date">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="{{ $item->use_limit }}" name="use_limit" placeholder="Use Limit">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="{{ $item->percent }}" name="percent" placeholder="Percentage">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="{{ $item->desc }}" name="desc" placeholder="Description">
            </div>
          @endforeach
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Save</button>
          </div>
        </form>
    </div>
    </div>
</div>
@endsection
