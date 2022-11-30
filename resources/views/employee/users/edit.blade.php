@extends('admin.master')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Edit</div>
<div class="card-body">

<form action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data" method="POST">

    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">First Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ $user->f_name }}">
            @error('f_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">Last Name</label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ $user->l_name }}">
            @error('l_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    {{-- <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">New Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> --}}

    @csrf
    {{ method_field('PUT') }}

    <div class="form-group row">
        <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
        <div class="col-md-6">
        @foreach ($roles as $role)
        <div class="form-check">
            <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
            <label>{{ $role->urole }}</label>
            </div><br/>
        @endforeach
    </div>
    </div>
        <button class="btn btn-outline-success" type="submit">Update</button>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
