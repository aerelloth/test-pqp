@extends('layouts.bootstrap.layout')

@section('content')

<div class="text-center">
    <h1 class="pt-3 pb-3">Les films du moment</h1>

    @if ($movies->isEmpty())
        <p>Il n'y a encore aucun film enregistré.</p>
    @else
    <div class="row">
        @foreach ($movies as $movie)
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
        @endforeach
    </div>
    @endif
</div>

@endsection

