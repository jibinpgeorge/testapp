@extends('layout.layout')
@section('content')
<div class="container">
{!! csrf_field() !!}
<div class="row">
	@foreach($bikeDetails->stationBeanList as $bike)
		<div class="col-md-4">
			<div class="col-bikes">
			<h3><a href="{{URL::to('home/post/'.$bike->id)}}">{{$bike->stationName}}</a></h3>
			<p>Available Docks: {{$bike->availableDocks}}</p>
			<p>Total Docks: {{$bike->totalDocks}}</p>
			<p>Status Value: {{$bike->statusValue}}</p>
			<p>Available Bikes: {{$bike->availableBikes}}</p>
			<p>Address: {{$bike->stAddress1}}</p>
			<div class="post-love" data-bikeid="{{$bike->id}}" onclick="ajaxSave({{$bike->id}});">
				<?php
					$dataTrue = false;
					if(in_array((int)$bike->id,$post_ids)){
						$dataTrue = true;
					}
				?>
				<i class="fa fa-heart-o fa-color-red" @if($dataTrue == 1) style="display:none;" @endif></i>
				<i class="fa fa-heart fa-color-red" @if($dataTrue != 1) style="display:none;" @endif></i>
			</div>
			<br>
			<a href="{{URL::to('home/post/'.$bike->id)}}" class="btn btn-info">
			<i class="fa fa-plus"></i> Comment</a>
			</div>
		</div>
	@endforeach
</div>
</div>
@stop