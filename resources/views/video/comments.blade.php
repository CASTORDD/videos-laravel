<h4>Comentarios</h4>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<form class="col-md-12" method="POST" action="{{ url('/comment') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="video_id" value="{{ $video->id }}" required>
	<div class="form-group">
		<textarea class="form-control" name="body" required></textarea>
	</div>	
	<input type="submit" name="" value="Comentar" class="btn btn-success">
</form>