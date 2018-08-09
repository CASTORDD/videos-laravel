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
                <li class="video__item col-md-4 pull-left">
                    <!-- Imagen -->                      
                    <div class="vodeo-image-thumb">
                        <div class="col-md-6 col-md-offset-3">
                            <img src="{{ url('/miniatura/'.$video->image) }}"/>
                        </div>
                    </div>

                    @if(Storage::disk('images')->has('$video->image'))
                        <div class="vodeo-image-thumb">
                            <div class="col-md-6 col-md-offset">
                                <img src="{{ url('/miniatura/'.$video->image) }}"/>
                            </div>
                        </div>                        
                    @endif
                    
                    <div class="data">
                        <h4>{{ $video->title }}</h4>
                        <img src="">
                    </div>
                    <!-- botones -->
                </li>
            @endforeach 
            </ul>
            {{ $videos->links() }}
        </div>
        
    </div>
</div>
@endsection
