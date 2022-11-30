@extends('layouts.app')
@section('style_css')

<style>
* {
	font-family: 'Poppins', sans-serif;
}

body {
	color: #000000;
	overflow-x: hidden;
	font-size: 14px;
}

.h-100vh {
	height: 100vh !important;
}

.card {
	margin: 0 auto;
	max-width: 700px;
	border: none;
	-webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14),
		0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14),
		0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);

}

@media only screen and (max-width: 767px) {
	body{
		padding-top: 20px;
	}
	.card {
		width: 100%;
	}
}

input[type="checkbox"] {
	display: none;
}

.custom-control-input:checked~.custom-control-label::before {
	color: #FDFFFC !important;
	border-color: #26A598 !important;
	background-color: #26A598 !important;
}

.text-center {
	color: #FDFFFC !important;
	background-color: #e8d4f5 !important;
}
</style>
@endsection
@section('content')

<div class="container h-100vh">
	<div class="row row h-100 align-items-center justify-content-centerr">
		<div class="col align-self-cente ">
			<div class="card">

				<div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="firstName">Username</label>
								<input type="text" class="form-control form-control-lg" name="name" placeholder="Username">
							</div>

							<div class="form-group col-md-6">
								<label for="Sername">Business Phone</label>
								<input type="text" class="form-control form-control-lg" name="phone" placeholder="Business Phone">
								{{-- <input type="hidden" name="phone" value="vendor"> --}}
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputEmail4">Business Email</label>
								<input type="email" name="email" class="form-control form-control-lg" placeholder="Business Email">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Password</label>
								<input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
							</div>
                            <div class="form-group col-md-6">
								<label for="inputPassword4">Confirm Password</label>
								<input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password">
							</div>
                            <div class="form-group col-md-12">
                                <label for="phonenumber">Address</label>
                                <textarea type="text" class="form-control form-control-lg" name="address" placeholder="Address"></textarea>
                            </div>
						</div>

						<div class="form-group">
							<small><a href="{{route('login')}}" class="form-text text-muted">I have an account!</a></small>
						</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">Signup</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
@section('footer_js')

@endsection
