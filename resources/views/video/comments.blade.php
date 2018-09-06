@if(Auth::check())
	<hr>
	<h4>Comentarios</h4>
	<hr>
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
	<div class="clearfix"></div>
	<hr>
@endif

@if(isset($video->comments))
	<div id="commentsList col-md-12">
		@foreach($video->comments as $comment)
			<div class="comment__item">
				<div class="card comment__data">
					<p class="card-header">
						Publicado por <strong>{{ $comment->user->name.' '.$comment->user->surname}} </strong> 
						{{ \FormatTime::LongTimeFilter($comment->created_at)}}
					</p>
					<div class="card-body">
						{{ $comment->body }}
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endif