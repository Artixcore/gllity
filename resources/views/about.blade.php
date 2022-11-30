@extends('layouts.app')

@section('style_css')

@endsection

@section('content')

    <div class="container py-4">

        <div class="card">
 @foreach ($about as $abouts)

            <div class="card-header"><h2>{{ $abouts->about_title }}</h2></div>

            <div class="card-body">

                 <p>{{ $abouts->about_desc }}</p>

@endforeach
            </div>

        </div>

    </div>

@endsection
