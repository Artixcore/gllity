@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<div class="card">
    <div class="card-header"> <a href="{{ url('superadmin/companies') }}" class="btn btn-outline-success"> Back </a> </div>
     @foreach ($company as $item)
        <form action="{{url('edit-shop', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <input type="file" class="form-control-file" name="company_logo">
           </div>
           <!--<div class="form-group">-->
           <!--   <input type="file" class="form-control-file" name="shop_banner">-->
           <!--</div>-->
          <div class="form-group">
            <input type="text" class="form-control" value="{{$item->company_name}}" name="company_name" placeholder="Shop Name">
          </div>
            <div class="form-group">
            <input type="text" class="form-control" value="{{$item->name}}" name="name" placeholder="User Name">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" value="{{$item->email}}" name="email" placeholder="User Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="" name="password" placeholder="User Default Password">
            </div>

          <div class="form-group">
              <select name="shop_location" class="form-control">
                  @foreach (App\Location::all() as $location)
                  <option value="{{$location->city}}, {{$location->state}}, {{$location->country}}">{{$location->city}}, {{$location->state}}, {{$location->country}}</option>
                  @endforeach
             </select>
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
