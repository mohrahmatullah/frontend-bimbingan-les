<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login - Les</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{url('assets/modules/bootstrap-5.1.3/css/bootstrap.css')}}">
	<!-- Style CSS -->
	<link rel="stylesheet" href="{{url('assets/css/style.css')}}">
	<!-- Boostrap Icon-->
	<link rel="stylesheet" href="{{url('assets/modules/bootstrap-icons/bootstrap-icons.css')}}">
</head>
<body>
 
	<div id="auth">
        
		<div class="row h-100">
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-left">
 				</div>
			</div>
			<div class="col-lg-5 col-12">
	      @if($alert_toast = Session::get('alert_toast'))
	          <div class="col-12 mb-4 mt-3">
	            <div class="hero bg-primary text-white">
	              <div class="hero-inner">
	                <h2>{{$alert_toast['title']}}</h2>
	                <p class="lead">{{$alert_toast['text']}}</p>
	              </div>
	            </div>
	          </div>
	      @endif
				<div id="auth-right">
					<div class="auth-logo">
						<a href="index.html"><img src="{{url('assets/images/logo.png')}}" alt="Logo"> LES</a>  
					</div>
					<h1 class="auth-title">Log in.</h1>
					<p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
		
					<form action="" method="POST" enctype="multipart">
						@csrf
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<!-- <div class="form-check form-check-lg d-flex align-items-end">
							<input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
							<label class="form-check-label text-gray-600" for="flexCheckDefault">
								Keep me logged in
							</label>
						</div> -->
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
					</form>
					<div class="text-center mt-5 text-lg fs-4">
						<p class="text-gray-600">Don't have an account? <a href="{{ route('get-register') }}" class="font-bold">Sign
								up</a>.</p>
						<p><a class="font-bold" href="{{ route('forgot-password') }}">Forgot password?</a>.</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
		
	 

	<!-- General JS Scripts -->
	<script src="{{url('assets/js/atrana.js')}}"></script>

	<!-- JS Libraies -->
	<script src="{{url('assets/modules/jquery/jquery.min.js')}}"></script>
	<script src="{{url('assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{url('assets/modules/popper/popper.min.js')}}"></script>

    <!-- Template JS File -->
	<script src="{{url('assets/js/script.js')}}"></script>
	<script src="{{url('assets/js/custom.js')}}"></script>
 </body>
</html>