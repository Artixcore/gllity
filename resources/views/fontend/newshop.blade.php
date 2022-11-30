@extends('layouts.profile')

@section('style_css')
<style>
      .sh{
    /* border-radius: 25px; */

    box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -webkit-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
    -moz-box-shadow: -1px 0px 13px -2px rgba(0,0,0,0.86);
  }
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #ffffff;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
@endsection

@section('content')
<div class="container py-5">
                <div class="main-body sh">
                  <div class="row gutters-sm">
                    <div class="col-md-12">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-8">
                               <div class="card">
                                <form action="{{url('newshop')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="shop_logo">
                                   </div>
                                   <div class="form-group">
                                      <input type="file" class="form-control-file" name="shop_banner">
                                   </div>
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="shop_name" placeholder="Shop Name">
                                    <input type="hidden" value="{{Auth::user()->name}}" name="name">
                                    <input type="hidden" value="{{Auth::user()->email}}" name="email">
                                    {{-- <input type="hidden" value="{{Auth::user()->email}}" name="user_"> --}}
                                    <input type="hidden" value="password12" name="password">
                                  </div>
                                  <div class="form-group">
                                      <textarea type="text" class="form-control" name="shop_desc" placeholder="Shop Description"></textarea>
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

                               </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <ul class="list-group">
                                    <li class="list-group-item">Complete Bookings ()</li>
                                    <li class="list-group-item">Pending Bookings  ()</li>
                                    <li class="list-group-item">Approved Bookings ()</li>
                                    <li class="list-group-item">Walk-in Bookings  ()</li>
                                </ul>
                            </div> --}}
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                </div>

@endsection
