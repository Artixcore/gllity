@extends('superadmin.master')

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
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#Currency">Currency Settings</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#seo">SEO Settings</a>
            {{-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#terms">Terms & Condition</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#privacy">Privacy & Policy</a> --}}
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#footer">Footer Cradit</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#about">About</a>
          </div>
        </div>
        <div class="col-md-10">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

               {{--<form action="{{ url('superadmin/logo') }}" method="post" enctype="multipart/form-data">-->
                <!--   @csrf-->
                <!--    <div class="form-group">-->
                <!--        <label class="form-label">Site Logo</label>-->
                <!--        <input type="file" name="site_logo" class="form-control-file">-->
                <!--    </div>-->
                <!--    <div class="form-group">-->
                <!--        <input type="submit" class="btn btn-outline-success" value="Save Logo">-->
                <!--    </div>-->
                </form>--}}

            @foreach(App\Site::all() as $si)
            <form action="{{ url('superadmin/service/general', $si->id) }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label class="form-label">Site Logo</label>
                    <input type="file" name="site_logo" class="form-control-file">
                </div>
                <div class="form-group">
                  <label class="form-label">Site Name</label>
                  <input type="text" name="site_name" value="{{ $si->site_name }}" class="form-control mb-1">
                </div>
                <div class="form-group">
                  <label class="form-label">Site E-mail</label>
                  <input type="text" name="site_email" class="form-control mb-1">
                </div>
                <div class="form-group">
                  <label class="form-label">Site Phone</label>
                  <input type="text" name="site_phone" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Site Address</label>
                    <input type="text" name="site_address" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Site Location</label>
                    <select name="site_location" class="form-control">
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
            @endforeach
            </div>

            <div class="tab-pane fade" id="Currency">
              <div class="card-body pb-2">
               <form action="{{ url('superadmin/service/currency') }}" method="post">
                @csrf
                <div class="form-group">
                  <label class="form-label">Currency Name</label>
                  <input type="test" name="c_name" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Currency Symbol</label>
                  <input type="test" name="c_symbol" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Currency Code</label>
                  <input type="test" name="c_code" class="form-control">
                </div>
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                  </div>
                </form>
                <table class="table">
                    <thead>
                      <tr>
                        {{-- <th scope="col">SL</th> --}}
                        <th scope="col">Currency Name</th>
                        <th scope="col">Currency Code</th>
                        <th scope="col">Currency Symbol</th>
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
                            <form action="{{url('superadmin/service/currency/delete', $currency->id)}}" method="POST">
                                @method('POST')
                                @csrf
                                <button class="btn btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>

            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">
                  <form action="{{url('superadmin/service/social')}}" method="POST">
                    @csrf
                <div class="form-group">
                  <label class="form-label">Your Social Network Icon from fontawesome</label>
                  <input type="text" class="form-control" name="social_icon" placeholder="Please Provide icon name from fontawesome">
                </div>
                <div class="form-group">
                    <label class="form-label">Your Social Account URL</label>
                    <input type="text" class="form-control" name="social_links" placeholder="Your social Link">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </form>
                <table class="table">
                    <thead>
                      <tr>
                        {{-- <th scope="col">SL</th> --}}
                        <th scope="col">Icon</th>
                        <th scope="col">Social Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Social::all() as $social)
                      <tr>
                        {{-- <th scope="row">1</th> --}}
                        <th>{!! $social->social_icon !!}</th>
                        <th>{{ $social->social_links }}</th>
                        <td>
                        <form action="{{url('superadmin/service/social/delete', $social->id)}}" method="POST">
                            @method('POST')
                            @csrf
                            <button class="btn btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>

            <div class="tab-pane fade" id="seo">
              <form action="{{url('superadmin/service/seo')}}" method="post">
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
                            <a class="btn btn-outline-success" href="{{ url('superadmin/service/seo/edit', $seo->meta_author) }}">Edit</a>
                            {{-- <a href="{{ url('superadmin/service/seo/delete', $seo->id) }}" class="btn btn-outline-danger" type="submit">Delete</a> --}}
                            <form action="{{url('superadmin/service/seo/delete', $seo->id)}}" method="POST">
                                @method('POST')
                                @csrf
                                <button class="btn btn-outline-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>

            <div class="tab-pane fade" id="footer">
                <div class="card-body pb-2">
                <div class="form-group">
                @php
                    $footers = App\Footer::all();
                @endphp
                @foreach ($footers as $footer)

                <form action="{{url('superadmin/service/footer/update', $footer->id)}}" method="POST">
                        @csrf
                    <label class="form-label">Footer Cradit</label>
                    <input type="text" name="footer" value="{{ $footer->footer }}" placeholder="All Rights Reserved by..." class="form-control">
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </form>

                @endforeach
                </div>

                <table class="table">
                    <tbody>
                        @foreach (App\Footer::paginate(5) as $key=> $footer)
                      <tr>
                        <th>{{ $footer->footer }}</th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>

            {{-- About Us --}}
            <div class="tab-pane fade" id="about">
                <div class="card-body pb-2">

                    @php
                        $abouts = App\About::all();
                    @endphp

              @foreach ($abouts as $about)
                <form action="{{url('superadmin/service/about', $about->id)}}" method="POST">
                    @csrf
                <div class="form-group">
                    <label class="form-label">About Title</label>
                    <input type="text" value="{{ $about->about_title }}" name="about_title" placeholder="About Title.." class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="form-label">About Description</label>
                    <textarea type="text" value="{{ $about->about_desc }}" name="about_desc" placeholder="About Description..." class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </form>
                @endforeach
                <br/>
                <table class="table">
                    <tbody>
                        @foreach (App\About::paginate(5) as $key=> $footer)
                      <tr>
                        <th>{{ $footer->about_title }}</th>
                        <th>{{ $footer->about_desc }}</th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

            </div>

            {{-- Privacy and Policy --}}
            <div class="tab-pane fade" id="privacy">
                <div class="card-body pb-2">
                <form action="{{url('superadmin/service/privacy')}}" method="POST">
                        @csrf
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input type="text" name="privacy_title" placeholder="Title.." class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="privacy_desc" placeholder="Description..." class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-outline-success">Save</button>
                  </div>
                </form>
                </div>
            </div>
                        {{-- Privacy and Policy --}}
                        <div class="tab-pane fade" id="terms">
                            <div class="card-body pb-2">
                            <form action="{{url('superadmin/service/terms')}}" method="POST">
                                    @csrf
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" name="term_title" placeholder="Title.." class="form-control">
                              </div>
                              <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea type="text" name="term_desc" placeholder="Description..." class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-outline-success">Save</button>
                              </div>
                            </form>
                            </div>
                        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  @endsection
