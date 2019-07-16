@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="row col-md-8">
		<div class="col-md-4">
			<h3>Busqueda: {{ $search }}</h3><br>
		</div>	
		<div class="col-md-8">
			<form class="form-inline justify-content-end" action="{{ url('/buscar/'.$search) }}" method="get">
				<div class="form-group">
					<label for="filter">Ordenar</label>
					<select name="filter" class="form-control mx-sm-3">
						<option value="new">Mas nuevo</option>
						<option value="old">Mas antiguo</option>
						<option value="alfa">A - Z</option>
					</select>
				</div>
				<input type="submit" value="Ordenar" class="btn btn-success">
			</form>
		</div>
	</div>	

	@include('video.videosList')

</div>

@endsection