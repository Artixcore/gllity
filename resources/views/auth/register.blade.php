@extends('layouts.app')
@section('style_css')

@section('content')

    <!-- Basic -->
    <div class="ex-form-1">
        <div class="container">
            <div class="row">
			
                <div class="col-xl-6 offset-xl-3">
				<h4 class="text-center">Registruj se</h4>
                    <div class="text-box mt-5 mb-5">
                        <p class="mb-4">Ispunite obrazac kako biste se prijavili. Već ste se prijavili? Onda <a class="pink" href="log-in.html">Prijavi se</a></p>

                    
						
						
						<form id="signUpForm" action="{{route('register')}}" method="post">
							@csrf
						    <div class="form-group">
                                <input type="text" class="form-control-input" id="name" name="name" required oninvalid="this.setCustomValidity('Molimo unesite Korisničko ime')" oninput="setCustomValidity('')">
                                <label class="label-control" for="name">Korisničko ime</label>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="email" name="email" required oninvalid="this.setCustomValidity('Molimo unesite Email')" oninput="setCustomValidity('')">
                                <label class="label-control" for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control-input" id="phone" name="phone"  required oninvalid="this.setCustomValidity('Molimo unesite Broj telefona')" oninput="setCustomValidity('')">
                                <label class="label-control" for="phone">Broj telefona</label>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" id="password" name="password" required oninvalid="this.setCustomValidity('Molimo unesite Lozinku')" oninput="setCustomValidity('')">
                                <label class="label-control" for="password">Lozinka</label>
                            </div>
							<div class="form-group">
                                <input type="password" class="form-control-input" id="password" name="password_confirmation" required oninvalid="this.setCustomValidity('Molimo unesite Lozinku')" oninput="setCustomValidity('')">
                                <label class="label-control" for="password">Lozinka</label>
                            </div>
							<div class="form-group">
                                <textarea type="text" class="form-control-input" name="address" required oninvalid="this.setCustomValidity('Molimo unesite Lozinku')" oninput="setCustomValidity('')"></textarea>
                                <label class="label-control" for="password">Lozinka</label>
                            </div>
                            <div class="form-group checkbox">
                               Registrovanjem prihvatate da ste upoznati i slažete se sa: <a href="privacy.html">Privatnost</a> i <a href="terms.html">Uslovi korišćenja</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Registruj se</button>
                            </div>
                        </form>
						
						
						
						
                        <!-- end of log in form -->

                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->



@endsection
@section('footer_js')

@endsection
