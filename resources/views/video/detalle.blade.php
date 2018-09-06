@extends('layouts.app')

@section('content')
<div class="row justify-content-md-center">
	<div class="col-md-6">
		<h2>{{ $video->title }}</h2>
		<div class="col-md-8">
			<!-- Video -->
			<video controls id="video__player">
				<source src="{{ route('fileVideo', ['filename' => $video->video_path])}}">
				Tunavegador no es compatrible con html5
			</video>
			<!-- Descripción -->
			<div class="card video__data">
				<p class="card-header">
					Publicado por <strong>{{ $video->user->name.' '.$video->user->surname}} </strong> 
					{{ \FormatTime::LongTimeFilter($video->created_at)}}
				</p>
				<div class="card-body">
					<h3 class="card-title">{{ $video->title }}</h3>
					{{ $video->description }}
				</div>
				<div class="card-footer text-muted">
					<!-- Comentarios -->
					@include('video.comments')    
			  	</div>
			</div>
		</div>
	</div>
</div>

@endsection