<div class="col-md-8">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul id="video__list">

        @if(count($videos) >= 1)
        @foreach($videos as $video)
            <li class="video__item col-md-10 pull-left card">
                <div class=" row card-body">
                     <!-- Imagen -->
                    @if(Storage::disk('images')->has($video->image))
                        <div class="col-md-4 video-image-thumb">
                            <div class="video__image__mask">
                                <img src="{{ url('/miniatura/'.$video->image) }}" class="video__image" />
                            </div>
                        </div>                        
                    @endif

                    <div class="col-md-8 data">
                        <h4><a href="{{ route('detailVideo', ['video_id' => $video->id])}}">{{ $video->title }}</a></h4>
                        <span>
                            <!-- <a href="canal/{{ $video->user->id }}">{{ $video->user->name.' '.$video->user->surname }}</a> -->
                            <a href="{{ route('channel', ['user_id' => $video->user->id]) }}">{{ $video->user->name.' '.$video->user->surname }}</a> | {{ \FormatTime::LongTimeFilter($video->created_at)}}
                        </span>
                    </div>
                    <!-- botones -->
                    <div class="panel__buttons">
                        @if(Auth::check() && Auth::User()->id == $video->user->id)
                            <a href="{{ route('editVideo', ['video_id' => $video->id])}}" class="btn btn-warning">Editar</a>
                            <a href="#videoDelete{{ $video->id }}" class="btn btn-danger" data-toggle="modal" data-target="#videoDelete{{ $video->id }}">
                              Eliminar
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="videoDelete{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <span class="font-weight-bold">¿Deseas borrar el video?</span>
                                            <p>{{ $video->title }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <a href="{{ url('/delete-video/'.$video->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif    
                    </div>
                    
                </div>
            </li>
        @endforeach
        @else
            <div class="alert alert-warning">
                No se encontraron videos con la palabra <strong>{{ $search }}</strong>
            </div>
        @endif
    </ul>
    {{ $videos->links() }}
</div>