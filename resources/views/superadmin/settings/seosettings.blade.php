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
<div class="container container-p-y">
           @foreach ($seos as $seo)
              <form action="{{url('superadmin/service/seo/update', $seo->id)}}" method="post">
                @csrf
                <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Meta Keywords</label>
                      <input type="text" name="meta_keywords" value="{{ $seo->meta_keywords }}" placeholder="Meta Keywords" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Meta Author</label>
                        <input type="text" name="meta_author" value="{{ $seo->meta_author }}" placeholder="Meta Author" class="form-control">
                     </div>
                    <div class="form-group">
                       <label class="form-label">Meta Description</label>
                       <textarea class="form-control" name="meta_desc" value="{{ $seo->meta_desc }}" placeholder="Meta Description(Not more then 250 Words)"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                  </div>
                </form>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  @endsection
