<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>App</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="">
		<meta name="author" content="Admin">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }} " rel="stylesheet">
		<link href="{{ URL::asset('assets/css/font-awesome.min.css') }} " rel="stylesheet">
		<link href="{{ URL::asset('assets/css/screen.css') }} " rel="stylesheet">
		<!-- Skin CSS -->
		<!-- Head Libs -->
		<script type="text/javascript">
			var siteUrl = "{{URL::to('home')}}";
		</script>
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/script.js') }}"></script>
		@yield('scripts')
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="{{URL::to('home')}}">Home</a></li>
	          </ul>	
	          <ul class="nav navbar-nav">
	            <li><a href="{{URL::to('/home/favorites')}}">Favorites</a></li>
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="{{URL::to('/auth/logout')}}">Log Out</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>