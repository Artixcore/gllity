@extends('superadmin.master')

@section('content')
<div class="container py-4">
        <div class="card">
            @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            <div class="col-md-12 py-4">
                <a class="btn btn-outline-primary" data-toggle="modal" data-target="#addcoupon">
                    <i class="fas fa-plus"></i> Add New Coupon
                </a>
                <p></p>
    <table class="table" id="usertable">
        <thead>
          <tr>
             <th scope="col">SL.</th>
             <th scope="col">Coupon Code</th>
             <th scope="col">Start Date</th>
             <th scope="col">End Date</th>
            <th scope="col">Use Limit</th>
            <th scope="col">Percent</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($coupon as $key=> $item)
    <tr>
        <td> {{$coupon->firstItem()+$key}} </td>
        <td> {{$item->coupon_code}} </td>
        <td> {{$item->start_date}} </td>
        <td> {{$item->end_date}} </td>
        <td> {{$item->use_limit}} </td>
        <td> {{$item->percent}}</td>
        <td> {{$item->desc}}</td>
        <td><a href="{{ url('superadmin/coupon/edit', $item->coupon_code) }}"><i class="fa fa-edit"></i></a></td>
        <td>
            <form action="{{url('superadmin/coupon/delete', $item->id)}}" method="POST">
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
</div>
</div>

<div class="modal fade" id="addcoupon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('superadmin/coupons/add')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="start_date" placeholder="Start Date">
          </div>
          <div class="form-group">
            <input type="date" class="form-control" name="end_date" placeholder="End Date">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="use_limit" placeholder="Use Limit">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="percent" placeholder="Percentage">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="desc" placeholder="Description">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
      </form>
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
