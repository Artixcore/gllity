<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>

    a{
        font-size: 16px;
    }

           .sha{ box-shadow:  5px 5px 10px #cacaca,
             -5px -5px 10px #f6f6f6;
            }
        /* Dropdown Button */
.dropbtn {
  background-color: #ffffff;
  color: rgb(0, 0, 0);
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #ffffff;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #ffffff;}
    </style>
    @yield('style_css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white sha">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 28px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    {{-- <form class="form-inline">
                        <div class="input-group">
                          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        </div>
                    </form> --}}
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Auth::user())
                        {{-- <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropbtn" style="color: #000000;"><i class="fas fa-envelope 3x"></i><span class="badge badge-light">4</span></a>
                                <div class="dropdown-content">
                                  <a href="#">Link 1</a>
                                  <a href="#">Link 2</a>
                                  <a href="#">Link 3</a>
                                </div>
                            </div>
                        </li> --}}

                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropbtn" style="color: #000000;"><i class="nav-icon fas fa-bell 2x"></i><span class="badge badge-light">4</span></a>
                                <div class="dropdown-content">
                                  <a href="#">Link 1</a>
                                  <a href="#">Link 2</a>
                                  <a href="#">Link 3</a>
                                </div>
                            </div>
                        </li>

                        @endif
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-success" href="{{ route('login') }}">Login / Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <div class="dropdown">
                                <a class="nav-link dropbtn" style="color: #000000;">
                                    <i class="fas fa-user"></i>   <i class="fas fa-caret-down"></i>
                                </a>
                                {{-- dropbtn --}}
                                <div class="dropdown-content">
                                    @can('manage-users')
                                    @if (Auth::user()->urole == 'admin')
                                    <a href="{{ route('admin.users.index') }}">
                                        <i class="fas fa-user-shield"></i>  Admin
                                    </a>
                                    @elseif (Auth::user()->urole == 'superadmin')
                                    <a href="{{ route('superadmin.users.index') }}">
                                        <i class="fas fa-user-shield"></i> Super Admin
                                    </a>
                                    @else
                                    @endif
                                    @endcan

                                    <a href="{{ url('profile') }}"> <img src="{{ asset('user') }}/{{ Auth::user()->avatar }}" alt="User image" style="height: 35px; width:35px; border-radius: 25px;">  Profile </a>
                                    <a href="{{ url('edit') }}/{{Auth::user()->name}}"> <i class="fas fa-cog"></i> Settings </a>

                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container py-4">
            @yield('content')
            </div>
        </main>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('footer_js')

</body>
</html>
