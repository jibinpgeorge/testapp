<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<title>Login</title>
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
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		@yield('scripts')
	</head>
	<body>
		<!-- start: page -->
		
		<section class="body-sign" style="width:500px;margin:0 auto;padding:20px;">
			<div class="center-sign" >
				<div class="panel panel-sign" style="padding:20px;">
					<div class="panel-title-sign mt-xl text-left">
						<h2 class="title text-uppercase text-weight-bold m-none" style="text-align:center;">
							Sign In
						</h2>
					</div>
					<div class="panel-body">
						<form class="form-signin" method="POST" action="{{url('auth/auth')}}">
						
						{!! csrf_field() !!}
                            
							<div class="form-group mb-lg">
								<label>Email ID</label>
								<div class="input-group input-group-icon">
									<input name="email" type="text" placeholder="Email" class="form-control input-md" value="{{old('email')}}" required autofocus />
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" placeholder="Password" type="password" class="form-control input-md" required />
									<span class="input-group-addon">
										<span class="icon icon-md">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							@if (count($errors))
								<div class="row error-message"> 
							        @foreach($errors->all() as $error)
							            <div class="col-md-12">{{ $error }}</div>
							        @endforeach
								</div>
							@endif
							<div class="row">
								<div class="col-sm-4 text-left">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
								</div>
								<div class="col-sm-8 text-right">
									Don't have an account? <a href="{{URL::to('/auth/register')}}" class="btn btn-default hidden-xs">Register</a>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</section>
	</body>
</html>