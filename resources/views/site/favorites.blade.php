@extends('layout.layout')
@section('content')
<div class="container">
{!! csrf_field() !!}
<div class="row">
	@if(count($bikeDetails))
		@foreach($bikeDetails as $bike)
			<div class="col-md-4 col-data-panel" data-bikeid="{{$bike->post_id}}">
				<div class="col-bikes">
				<h3>{{$bike->station_name}}</h3>
				<p>Available Docks: {{$bike->available_docks}}</p>
				<p>Total Docks: {{$bike->total_docks}}</p>
				<p>Status Value: {{$bike->status_value}}</p>
				<p>Available Bikes: {{$bike->available_bikes}}</p>
				<p>Address: {{$bike->address}}</p>
				<a class="btn btn-danger" onclick="deletePosts({{$bike->post_id}})""><i class="fa fa-trash"></i> DELETE</a>
				</div>
			</div>
		@endforeach
	@else
		<div>
			No favourites addded yet.
		</div>
	@endif	
</div>
</div>
@stop