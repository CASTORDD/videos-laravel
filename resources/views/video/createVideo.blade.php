@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-md-center">
		<h2 class="col-md-6">Crear Video</h2>
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
		<form action="{{ url('/guardar-video')}}" method="post" enctype="multipart/form-data" class="col-lg-6">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label for="title">Titulo</label>
				<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
			</div>
			<div class="form-group">
				<label for="description">Descripción</label>
				<textarea id="description" name="description" class="form-control">
					{{ old('description') }}
				</textarea>
			</div>
			<div class="form-group">
				<label for="image">Imagen</label>
				<input type="file" id="image" name="image" class="form-control">
			</div>
			<div class="form-group">
				<label for="video">Video</label>
				<input type="file" id="video" name="video" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Adicionar Video</button>
		</form>
	</div>
</div>

@endsection