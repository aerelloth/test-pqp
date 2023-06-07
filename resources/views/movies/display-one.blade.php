@extends('layouts.bootstrap.layout')

@section('content')

<h1 class="pt-3 pb-3 text-center">{{$movie->title}}</h1>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card mb-3">
          <a href="{{ url('/movies/infos', ['id' => $movie->id]) }}"><img src="#" class="card-img-top" alt="{{$movie->title}}"></a>
          <div class="card-body">
            <h2 class="card-title">{{$movie->title}}</h2>
            <h3 class="card-text">{{$movie->tagline}}</h3>
            <p class="card-text">{{$movie->overview}}</p>
          </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <a href="{{ url('/') }}" class="btn btn-outline-primary">Voir encore plus de films</a>
</div>


@endsection
