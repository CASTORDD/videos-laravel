@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-md-center">
			<h2 class="col-md-6">Editar {{ $video->title }}</h2>
			<hr>
		</div>
		<div class="row justify-content-md-center">				
			@if($errors->any())
			<div class="col-lg-6 alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
		<div class="row justify-content-md-center">	
			<form action="{{ route('updateVideo', ['video_id' => $video->id]) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label for="title">Titulo</label>
					<input type="text" id="title" name="title" class="form-control" value="{{ $video->title }}">
				</div>
				<div class="form-group">
					<label for="description">Descripción</label>
					<textarea id="description" name="description" class="form-control">
						{{ $video->description }}
					</textarea>
				</div>
				<div class="form-group">
					<label for="image">Imagen</label>
					<div class="displayImg">
						@if(Storage::disk('images')->has($video->image))
                            <div class="col-md-6 video-image-thumb">
                                <div class="video__image__mask">
                                    <img src="{{ url('/miniatura/'.$video->image) }}" class="video__image" />
                                </div>
                            </div>                        
                        @endif
					</div>
					<input type="file" id="image" name="image" class="form-control">
				</div>
				<div class="form-group">
					<label class="col-12" for="video">Video</label>
					<video controls id="video__player" class="col-md-6">
						<source src="{{ route('fileVideo', ['filename' => $video->video_path])}}">
						Tunavegador no es compatrible con html5
					</video>
					<input type="file" id="video" name="video" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Actualizar Video</button>
			</form>
		</div>
	</div>
@endsection