@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <ul id="video__list">
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
                            <span>{{ $video->user->name.' '.$video->user->surname }}</span>
                        </div>
                        <!-- botones -->
                        <div class="panel__buttons">
                            @if(Auth::check() && Auth::User()->id == $video->user->id)
                                <a href="" class="btn btn-warning">Editar</a>
                                <a href="" class="btn btn-danger">Elimiinar</a>
                            @endif    
                        </div>
                        
                    </div>
                </li>
            @endforeach 
            </ul>
            {{ $videos->links() }}
        </div>
        
    </div>
</div>
@endsection
