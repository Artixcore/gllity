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
    <table class="table" id="usertable">
        <thead>
          <tr>
             <th scope="col">SL.</th>
             <th scope="col">Name</th>
             <th scope="col">First ame</th>
             <th scope="col">Last Name</th>
            <th scope="col">Role</th>
            <th scope="col">email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    @foreach ($users as $key=> $item)
    <tr>
        <td> {{$users->firstItem()+$key}} </td>
        <td> {{$item->name}} </td>
        <td> {{$item->f_name}} </td>
        <td> {{$item->l_name}} </td>
        <td> {{implode(',', $item->roles()->get()->pluck('urole')->toArray()) }} </td>
        <td> {{$item->email}}</td>
        <td><input type="checkbox" class="toggle-class" data-id="{{ $item->id }}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{ $item->status==true ? 'checked' : '' }}></td>
        <td>
            @can('edit-users')
            <a href="{{route('admin.users.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
            @endcan

            @can('delete-users')
            {{-- <a href="{{ route('admin.users.destroy', $item) }}"><i class="fa fa-trash"></i></a> --}}
            <form action="{{ route('admin.users.destroy', $item) }}" class="float-right" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <a><i class="fa fa-trash" aria-hidden="true"></i></a>
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
        </tbody>
      </table>
    {{ $item->links }}
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
        var status=$(this).prop('checked')==true ? 1 : 0;
        var user_id=$(this).data('id');

        $.ajax({
            type:'GET',
            dataType:'json',
            url: '{{ route('changestatus')}}',
            data: {'status':status , 'user_id':user_id},
            success:function(data){
                console.log(data);
            }
        });
    });
  </script>

@endsection
