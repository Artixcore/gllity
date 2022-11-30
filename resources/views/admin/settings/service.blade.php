@extends('admin.master')

@section('style_css')
<style>

body{
    background: #f5f5f5;
    margin-top:20px;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}



</style>
@endsection

@section('content')
<div class="container light-style flex-grow-1 container-p-y">
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-2 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#booking">Booking Settings</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#tax">Tax Settings</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#seo">SEO</a>
          </div>
        </div>
        <div class="col-md-10">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
            <form action="{{ url('admin/service/general') }}/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Shop Logo</label>
                    <input type="file" name="shop_logo" class="form-control-file mb-1">
                </div>
                <div class="form-group">
                    <label class="form-label">Shop Banner</label>
                    <input type="file" name="shop_banner" class="form-control-file mb-1">
                </div>
                <div class="form-group">
                  <label class="form-label">Shop Name</label>
                  <input type="text" name="shop_name" class="form-control mb-1">
                </div>
                <div class="form-group">
                    <label class="form-label">User Name</label>
                    <input type="text" name="name" class="form-control mb-1">
                </div>
                <div class="form-group">
                  <label class="form-label">User Email</label>
                  <input type="text" name="email" class="form-control mb-1">
                </div>
                <div class="form-group">
                  <label class="form-label">Shop desc</label>
                  <textarea type="text" name="shop_desc" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Shop Status</label>
                    <select name="shop_status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                   </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Shop Location</label>
                    <select name="shop_location" class="form-control">
                        @foreach (App\Location::all() as $location)
                        <option value="{{$location->city}}, {{$location->state}}, {{$location->country}}">{{$location->city}}, {{$location->state}}, {{$location->country}}</option>
                        @endforeach
                   </select>
                </div>
              </div>
              <div class="text-right mt-3">
                <button type="submit" class="btn btn-primary">Save</button>&nbsp;
              </div>
            </form>
            </div>

            <div class="tab-pane fade" id="booking">
              <div class="card-body pb-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal">
                    Booking
                </button>
                <table class="table">
                    <thead>
                      <tr>
                        {{-- <th scope="col">SL</th> --}}
                        <th scope="col">Day</th>
                        <th scope="col">Opening</th>
                        <th scope="col">Closing</th>
                        <th scope="col">Booking Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Currency::all() as $currency)
                      <tr>
                        {{-- <th scope="row">1</th> --}}
                        <th>{{ $currency->c_name }}</th>
                        <th>{{ $currency->c_code }}</th>
                        <th>{{ $currency->c_symbol }}</th>
                        <td>
                            <a href="#"><button class="btn btn-outline-success" type="submit">Edit</button></a>
                            <a href="#"><button class="btn btn-outline-danger" type="submit">Delete</button></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>


            <div class="tab-pane fade" id="seo">
              <form action="{{url('admin/service/seo')}}" method="post">
                @csrf
                <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Meta Keywords</label>
                      <input type="text" name="meta_keywords" placeholder="Meta Keywords" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Author</label>
                        <input type="text" name="meta_author" placeholder="Meta Author" class="form-control">
                     </div>
                    <div class="form-group">
                       <label class="form-label">Meta Description</label>
                       <textarea class="form-control" name="meta_desc" placeholder="Meta Description(Not more then 250 Words)"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                  </div>
                </form>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Meta Author</th>
                        <th scope="col">Meta keywords</th>
                        <th scope="col">Meta Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Meta::paginate(5) as $key=> $seo)

                      <tr>
                        <th>{{ $seo->meta_author }}</th>
                        <th>{{ $seo->meta_keywords }}</th>
                        <th>{{ $seo->meta_desc }}</th>
                         <td>
                            <a href="#"><button class="btn btn-outline-success" type="submit">Edit</button></a>
                            <a href="#"><button class="btn btn-outline-danger" type="submit">Delete</button></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>

            <div class="tab-pane fade" id="tax">
                <div class="card-body pb-2">
                <div class="form-group">
                    <label class="form-label">Tax Name</label>
                    <input type="text" placeholder="Nexmo Key" class="form-control">
                  </div>
                  <div class="form-group">
                     <label class="form-label">Tax Percent</label>
                     <input type="text" placeholder="Tax Percent" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="Active"> Active </option>
                        <option value="Inactive"> Inactive </option>
                    </select>
                 </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- Booking Setting --}}
<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  @endsection
