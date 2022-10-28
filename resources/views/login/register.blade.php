
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Register - Les</title>

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
				<div id="auth-right">
					<div class="auth-logo">
						<a href=""><img src="{{url('assets/images/logo.png')}}" alt="Logo"> LES</a>  
					</div>
					<h1 class="auth-title">Sign Up.</h1>
					<p class="auth-subtitle mb-5">Input your data to register to our website Bimbingan Belajar.</p>
		
					<form action="" method="POST">
						@csrf
						<div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="fullname" class="form-control form-control-xl" placeholder="Fullname">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
					    <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
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
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
					</form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('get-auth') }}" class="font-bold">Log
                                in</a>.</p>
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
