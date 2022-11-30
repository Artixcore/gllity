@extends('layouts.app')

@section('content')
    
    <!-- Basic -->
    <div class="ex-form-1">
        <div class="container">
            <div class="row">
			
                <div class="col-xl-6 offset-xl-3">
				<h4 class="text-center">Prijavi se</h4>
                    <div class="text-box mt-5 mb-5">
                        <p class="mb-4">Nemate nalog? Molimo <a class="pink" href="{{route('register')}}">Registruj se</a></p> 

                        <!-- Log In Form -->
                        <form id="logInForm" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control-input" name="email" id="email" required oninvalid="this.setCustomValidity('Molimo unesite Email')" oninput="setCustomValidity('')">
                                <label class="label-control" for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-input" name="password" id="password" required oninvalid="this.setCustomValidity('Molimo unesite Lozinku')" oninput="setCustomValidity('')">
                                <label class="label-control" for="password">Lozinka</label>
                            </div>
                            <div class="form-group checkbox">
                            Prijavljivanjem prihvatate da ste upoznati i slažete se sa: <a href="privacy.html">Privatnost</a> i <a href="terms.html">Uslovi korišćenja</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Prijavi se</button>
                            </div>
                        </form>
						<p class="mb-4"><a class="pink" href="#">Zaboravljena lozinka</a></p>
                        <!-- end of log in form -->

                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->




@endsection
