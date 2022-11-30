<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @foreach (App\Meta::all() as $meta)
    <meta name="author" content="{{$meta->meta_author}}">
    <meta name="keywords" content="{{$meta->meta_keywords}}">
    <meta name="description" content="{{$meta->meta_desc}}">
    @endforeach
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Zakažite frizera, kozmetičara i druge usluge u vašem gradu</title>

    <meta name="theme-color" content="#FFB7C2">
    <!-- SEO Meta Tags -->
    <meta name="description" content="Gllity - Zakažite profesionalno šminkanje, masažu, šišanje i druge usluge u vašem gradu">
    <meta name="author" content="Ismam Tabriz">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <link href="{{ asset('theme/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/swiper.css')}}" rel="stylesheet">
	<link href="{{ asset('theme/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{ asset('theme/css/styles.css')}}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('theme/images/favicon.png')}}">
    
   
</head>
<body data-spy="scroll" data-target=".fixed-top">


    @yield('style_css')
    </head>
	<body data-spy="scroll" data-target=".fixed-top">
	<!-- Header -->
	
	    <!-- Navigation -->
		<nav class="navbar navbar-expand-lg fixed-top navbar-light">
			<div class="container">
	
				<!-- Image Logo -->
	<a class="navbar-brand logo-image" href="/"><img src="{{ asset('theme/images/logo.png')}}" alt="alternative"></a> 
	<span class="nav-item">
		<select class="custom-select "  >
		<option selected="true" disabled="disabled">Odaberi grad</option>
		<option value="1">Sarajevo</option>     	
		<option value="2">Banja Luka</option>
		<option value="3">Mostar</option>
	  </select></span>
				<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
					<span class="navbar-toggler-icon"></span>
				</button>
	
	
						
				  
				<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
					<ul class="navbar-nav ml-auto">
						  <li class="nav-item">
					   <a class="btn-solid-sm page-scroll" href="log-in.html">Prijavi se</a>
						 </li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#category">Kategorije usluga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#istaknuta">Istaknuta mjesta </a>
						</li>
					
						<li class="nav-item">
							<a class="nav-link page-scroll" href="zapartnere.html">Za partnere</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="kontakt.html">Kontakt</a> 
						</li>
					
						@guest
						<li class="nav-item">
							<a class="nav-link page-scroll" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link page-scroll" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
						@endif 
					@else
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manu <i class="bi bi-chevron-down"></i></a>
					

						<div class="dropdown-menu" aria-labelledby="dropdown01">
							@can('manage-users')
							@if (Auth::user()->urole == 'admin')
							<a href="{{ route('admin.users.index') }}" class="dropdown-item page-scroll">Admin</a>
								<div class="dropdown-divider"></div>
							@elseif (Auth::user()->urole == 'superadmin')
							<a class="dropdown-item page-scroll" href="{{ route('superadmin.users.index') }}">Superadmin</a>
							<div class="dropdown-divider"></div>
							@else
							LOL
							@endif
							@endcan
						
								<a class="dropdown-item page-scroll" href="{{ url('profile') }}/{{Auth::user()->name}}">Profile</a>
								<div class="dropdown-divider"></div>
							
								<a href="{{ route('logout') }}" class="dropdown-item page-scroll"
								onclick="event.preventDefault();
											  document.getElementById('logout-form').submit();">
								 {{ __('Logout') }}</a>
								 
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>

							</div>
						</li>
						@endguest
											
					</ul>
				</div> <!-- end of navbar-collapse -->
			</div> <!-- end of container -->
		</nav> <!-- end of navbar -->
		<!-- end of navigation -->
	

    

	

	{{-- End Header --}}


            @yield('content')




	<!-- Start Footer Area -->
<!-- Footer -->
<div class="footer">
	<div class="container">
	  <div class="row">
		<div class="col-md-5">
		  <div class="text-container about"> <img src="{{ asset('theme/images/logo.png')}}" alt="Water Jet Blom | sjecenje vodenim mlazom"  height="60px">
			<p class="white">Gllity je jedan novi, sasvim inovativan i jednostavan onlajn servis za zakazivanje termina. U samo par klikova možete zakazati termin u svom omiljenom beauty salonu, pregled kod stomatologa, termin za tetoviranje ili piercing i još mnogo drugih usluga koje možete istražiti na našoj platformi. </p>
		  </div>
		  <!-- end of text-container --> 
		</div>
		<!-- end of col -->
		<div class="col-md-2">
		  <div class="text-container">
			<h5>Navigacija</h5>
			<ul class="list-unstyled li-space-lg white">
			  <li> <a class="white" href="#category">Kategorije usluga</a> </li>
			  <li> <a class="white" href="#istaknuta">Istaknuta mjesta </a> </li>
			  <li> <a class="white" href="zapartnere.html">Za partnere</a> </li>
			  <li> <a class="white" href="kontakt.html">Kontakt</a> </li>
			</ul>
		  </div>
		  <!-- end of text-container --> 
		</div>
		<!-- end of col -->
		
		<div class="col-md-2">
		  <div class="text-container">
			<h5>Ostalo</h5>
			<ul class="list-unstyled li-space-lg white">
			  <li> <a href="podrska.html">Korisnička podrška</a> </li>
			  <li><a href="onama.html">O nama</a> </li>
			  <li> <a href="faq.html">Najčešća pitanja</a> </li>
			   <li> <a href="terms.html">Uslovi korišćenja</a> </li>
			  <li><a href="privacy.html">Privatnost</a> </li>
			  
			</ul>
		  </div>
		  <!-- end of text-container --> 
		</div>
		
		
		
		
		<div class="col-md-3">
		
		
		<div class="footer-col third">
						  <span class="fa-stack">
							  <a href="#your-link">
								  <i class="fas fa-circle fa-stack-2x"></i>
								  <i class="fab fa-facebook-f fa-stack-1x"></i>
							  </a>
						  </span>
						  <span class="fa-stack">
							  <a href="#your-link">
								  <i class="fas fa-circle fa-stack-2x"></i>
								  <i class="fab fa-twitter fa-stack-1x"></i>
							  </a>
						  </span>
						  <span class="fa-stack">
							  <a href="#your-link">
								  <i class="fas fa-circle fa-stack-2x"></i>
								  <i class="fab fa-pinterest-p fa-stack-1x"></i>
							  </a>
						  </span>
						  <span class="fa-stack">
							  <a href="#your-link">
								  <i class="fas fa-circle fa-stack-2x"></i>
								  <i class="fab fa-instagram fa-stack-1x"></i>
							  </a>
						  </span>
						  <p class="p-large">Pratite nas na mrežama! </p>
					  </div>
	   
		
		</div>
		
		
		<!-- end of col --> 
	  </div>
	  <!-- end of row --> 
	</div>
	<!-- end of container --> 
  </div>
  <!-- end of footer --> 
  <!-- end of footer --> 
  
  <!-- Copyright -->
  <div class="copyright">
	<div class="container">
	  <div class="row">
		<div class="col-lg-7 col-xs-12 text-xs-center text-lg-right" >
		  <p class="p-small"> © 2021<a> Gllity.com </a>  </p></div>
		  <div class="col-lg-5 col-xs-12 text-xs-center  text-lg-right"><a href="https://www.fiverr.com/zannatnazila?up_rollout=true">Developed by<img style="margin: 2px 2px 2px 2px;" src="{{ asset('theme/images/pvf.ico')}}" width="35">Tabriz Tech.</a></div>
		<!-- end of col --> 
	  </div>
	  <!-- enf of row --> 
	</div>
	<!-- end of container --> 
  </div>
  <!-- end of copyright --> 
  <!-- end of copyright --> 
	  
		  
	  <!-- Scripts -->
	  <script src="{{ asset('theme/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
	  <script src="{{ asset('theme/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
	  <script src="{{ asset('theme/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
	  <script src="{{ asset('theme/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
	  <script src="{{ asset('theme/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
	  <script src="{{ asset('theme/js/scripts.js')}}"></script> <!-- Custom scripts -->
  </body>
  </html>