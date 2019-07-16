@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row col-md-8">
		<div class="col-md-4">
			<h3>Canal de {{ $user->name.' '.$user->surname }}</h3><br>
		</div>
	</div>	

	@include('video.videosList')

</div>

@endsection