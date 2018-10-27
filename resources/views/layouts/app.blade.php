<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Envo E-commerce</title>
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Envo E-commerce') }}</title>
	<!-- bootstrap -->
	<link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">      
	<link href="{{ asset('bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">

	<link href="{{ asset('themes/css/bootstrappage.css') }}" rel="stylesheet"/>

	<!-- global styles -->
	<link href="{{ asset('themes/css/flexslider.css') }}" rel="stylesheet"/>
	<link href="{{ asset('themes/css/main.css') }}" rel="stylesheet"/>
	
	

	<!-- scripts -->
	<script src="{{ asset('themes/js/jquery-1.7.2.min.js') }}"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>				
	<script src="{{ asset('themes/js/superfish.js') }}"></script>	
	<script src="{{ asset('themes/js/jquery.scrolltotop.js') }}"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		@section('header')
		@show
	</head>
	<body>
		@include('inc.navbar')
		@yield('content')
		@include('footer')
	</body>
	</html>