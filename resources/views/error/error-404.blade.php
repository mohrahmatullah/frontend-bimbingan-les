
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>404 - Blog</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="{{url('assets/modules/bootstrap-5.1.3/css/bootstrap.css')}}">
	<!-- Style CSS -->
	<link rel="stylesheet" href="{{url('assets/css/style.css')}}">
	<!-- Boostrap Icon-->
	<link rel="stylesheet" href="{{url('assets/modules/bootstrap-icons/bootstrap-icons.css')}}">
</head>
<body>
 
    <div id="error">
        <div class="container text-center">
        <div class="pt-8">
            <h1 class="errors-titles">404</h1>
            <p>Data not found</p>
            <a href="{{route('/')}}" class="text-blue btn btn-primary">Back to homepage</a>
          </div>
        </div>
    </div>
		
	 

	<!-- General JS Scripts -->
	<script src="assets/js/atrana.js"></script>

	<!-- JS Libraies -->
	<script src="{{url('assets/modules/jquery/jquery.min.js')}}"></script>
	<script src="{{url('assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{url('assets/modules/popper/popper.min.js')}}"></script>

    <!-- Template JS File -->
	<script src="{{url('assets/js/script.js')}}"></script>
	<script src="{{url('assets/js/custom.js')}}"></script>
 </body>
</html>
