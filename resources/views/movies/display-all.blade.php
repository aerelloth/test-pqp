@extends('layouts.bootstrap.layout')

@section('content')

<div class="text-center">
    <h1 class="pt-3 pb-3 display-3">Les films du moment</h1>

    @if ($movies->isEmpty())
        <p>Il n'y a encore aucun film enregistré.</p>
    @else
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @foreach ($movies as $movie)
            <div class="col">
                <div class="card h-100">
                  <a href="{{ url('/movies/infos', ['id' => $movie->id]) }}">
                    <img src="{{$api_config->images_secure_base_url.'w500'.$movie->backdrop_path}}" class="card-img-top" alt="{{$movie->title}}">
                  </a>
                  <div class="card-body">
                    <h2 class="card-title fs-5">{{$movie->title}}</h2>
                        <p class="rating">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < round($movie->vote_average/2))
                                    <i class="bi bi-star-fill"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor
                    </p>
                    <h3 class="card-text">{{$movie->tagline}}</h3>
                    <p class="card-text fw-light">{{ \Illuminate\Support\Str::limit($movie->overview, 400) }}</p>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>

@endsection

