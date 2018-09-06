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
						
						@if(Auth::check() && (Auth::user()->id == $comment->user->id || Auth::user()->id == $video->user()->id))
							<div class="float-right">
								<a href="#commentModal{{$comment->id}}" role="button" data-toggle="modal" class="btn-sm btn-danger">Eliminar</a>	
							</div>
							

							<!-- Modal -->
							<div class="modal fade" id="commentModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <span class="font-weight-bold">¿Deseas borrar el comentario?</span>
							        <p>{{ $comment->body }}</p>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							        <a href="{{ url('/delete-comment/'.$comment->id) }}" type="button" class="btn btn-danger">Eliminar</a>
							      </div>
							    </div>
							  </div>
							</div>
						@endif

					</div>

				</div>
				
			</div>
		@endforeach
	</div>
@endif