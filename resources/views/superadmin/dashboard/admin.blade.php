@extends('superadmin.master')
@section('content')

<div class="container py-4">

    <div class="row">

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ App\Shop::all()->count() }}</h3>
              <p>Total Companies</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" data-toggle="modal" data-target="#company" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ App\Shop::all()->count() }}</h3>
                <p>Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#company" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ App\User::all()->count() }}</h3>
              <p>Active Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ App\Shop::where('shop_status', 0)->count() }}</h3>
                <p>Inactive Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#company" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- ./col -->
      </div>

</div>

<!-- Modal -->
<div class="modal fade" id="company" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">All Companies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
@php


  $users = App\User::paginate(10);

@endphp
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Name</th>
                  {{-- <th scope="col">Company</th> --}}
                  <th scope="col">Email</th>
                </tr>
              </thead>
          @foreach ($users as $key=> $user)
            <tr>
              <td>{{$users->firstItem()+$key}}</td>
              <td>{{ $user->name }}</td>
              {{-- <td>{{ $user->b_name }}</td> --}}
              <td>{{ $user->email }}</td>
            </tr>
          @endforeach
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_js')

@endsection

