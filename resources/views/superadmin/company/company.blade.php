@extends('superadmin.master')

@section('content')
<div class="container py-4">
    <div class="col-md-12">
<!-- Button trigger modal -->
<a class="btn btn-outline-primary" data-toggle="modal" data-target="#addcompany">
    <i class="fas fa-plus"></i> Add New Company
</a>
<p></p>
<table class="table" id="usertable">
    <thead>
      <tr>

         <th scope="col">ID</th>
         <th scope="col">Logo</th>
         <th scope="col">Company</th>
         <th scope="col">Admin</th>
         <th scope="col">Email</th>
         <th scope="col">Location</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

@php
  $company = App\User::orderBy('created_at', 'asc')->get();
@endphp

@foreach ($company as $item)
<tr>
 
    <td> {{$item->user_number}} </td>
    <td> <img src="{{url('public/superadmin/images/shop')}}/{{$item->company_logo}}" style="height:50px; width:50px;"> </td>
    <td> {{$item->company_name}} </td>
    <td> {{$item->name}} </td>
    <td> {{$item->email}} </td>
    <td> {{$item->location}} </td>
    {{-- <td> {{$item->shop_location}} </td> --}}
    <td><input type="checkbox" class="toggle-class" data-id="{{ $item->id }}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{ $item->status==true ? 'checked' : '' }}></td>
    <td>
        <a href="{{url('edit-shop', $item->company_name)}}"><i class="fa fa-edit"></i></a>
    </td>
        <td>
        <form action="{{url('superadmin/company/delete', $item->id)}}" method="POST">
            @method('POST')
            @csrf
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-trash"></i></button>
        </form>

    </td>
</tr>
@endforeach
    </tbody>
  </table>

</div>

    <!-- Modal -->
    <div class="modal fade" id="addcompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Shop</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{-- @foreach ($location as $key=> $item) --}}
            <form action="{{url('newshop')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
              <div class="form-group">
                  {{-- <label>Company Logo</label> --}}

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Logo</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="company_logo" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>

             </div>
            <div class="form-group">
              <input type="text" class="form-control" name="company_name" placeholder="New Admin's Company Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="New Admin's Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="New Admin's Email">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="New Admin's Password">
            </div>
            <div class="form-group">
                <select name="location" class="form-control">
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
          {{-- @endforeach --}}
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

<script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
         on: 'Enabled',
        off: 'Disabled'
      });
    });

    $('.toggle-class').on('change', function(){
        var shop_status=$(this).prop('checked')==true ? 1 : 0;
        var shop_id=$(this).data('id');

        $.ajax({
            type:'GET',
            dataType:'json',
            url: '{{ route('shop_status')}}',
            data: {'shop_status':shop_status , 'shop_id':shop_id},
            success:function(data){
                console.log(data);
            }
        });
    });
  </script>

@endsection
