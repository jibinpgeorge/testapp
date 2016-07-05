@extends('layout.layout')
@section('content')
<div class="container">
<div class="row">
	@if(session('message'))
      <p class="alert alert-info">{{session('message')}}</p>
    @endif
	<div class="col-md-4">
		<div class="col-bikes">
		<h3>{{$bike->stationName}}</h3>
		<p>Available Docks: {{$bike->availableDocks}}</p>
		<p>Total Docks: {{$bike->totalDocks}}</p>
		<p>Status Value: {{$bike->statusValue}}</p>
		<p>Available Bikes: {{$bike->availableBikes}}</p>
		<p>Address: {{$bike->stAddress1}}</p>
		<form method="post">
		{!! csrf_field() !!}
		<textarea name="comment" class="form-control"></textarea>
		@if($errors->has('comment')) <span class="text-danger">{{$errors->first('comment')}}</span> @endif
		<br>
		<button class="btn btn-primary" id="form-comment">Submit</button>
		</form>
		</div>
	</div>
	<div class="col-md-8">
	@foreach($allComments as $single)
		<div class="row">
			<div class="col-sm-12">
			<div class="panel panel-default">
			<div class="panel-heading">
			<strong>{{$single->getUser->name}}</strong>, <span class="text-muted">{{$single->created_at}}</span>
			</div>
			<div class="panel-body">
			<?php echo $single->comment; ?>
			</div><!-- /panel-body -->
			</div><!-- /panel panel-default -->
			</div><!-- /col-sm-5 -->
		</div>
	@endforeach
	</div>
</div>
</div>
@stop