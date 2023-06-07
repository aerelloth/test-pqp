@extends('layouts.bootstrap.layout')

@section('content')

<div class="container pt-5">
<div class="row">
    <div class="col-md-6 col-lg-3 pb-3 pb-md-0">
        <img src="{{$api_config->images_secure_base_url.'w500'.$movie->poster_path}}" alt="{{$movie->title}}">
    </div>
    <div class="col-md-6 col-lg-9">
        <h1 class="pb-1">
            {{$movie->title}}
            @if ($movie->adult))
                <i class="bi bi-exclamation-triangle-fill" title="Ce film est réservé à un public adulte"></i>
            @endif
        </h1>
        <h2 class="fst-italic fw-light fs-5">{{$movie->original_title}}</h2>
            <p class="rating pt-2">
                @php $rating = round($movie->vote_average, 1); @endphp
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $rating/2)
                        <i class="bi bi-star-fill"></i>
                    @else
                        <i class="bi bi-star"></i>
                    @endif
                @endfor
                <span class="ps-2 fw-light">Note moyenne de <span class="fw-normal">
                    {{number_format($rating, 1, ',', '.')}}/10 </span>({{$movie->vote_count}} votes)</span>
            </p>
            @if ($movie->release_date)
                @php $formattedReleaseDate = date('d/m/Y', strtotime($movie->release_date)); @endphp
                <p>Date de sortie : <span class="fw-light">{{$formattedReleaseDate}}</span></p>
            @endif
            @if ($movie->budget)
                <p>Budget : <span class="fw-light">{{ number_format($movie->budget, 0, ',', '.') }} $</span></p>
            @endif
            @if ($movie->revenue)
                <p>Recettes : <span class="fw-light">{{ number_format($movie->revenue, 0, ',', '.') }} $</span></p>
            @endif
            @if($movie->tagline)
                <h3 class="fs-5 fw-semibold">{{$movie->tagline}}</h3>
            @endif
            @if($movie->overview)
            <p>{{$movie->overview}}</p>
            @endif
            @if($movie->homepage)
            <a href="{{$movie->homepage}}" class="btn btn-outline-secondary" target="_blank">En savoir plus</a>
            @endif
          </div>
        </div>
    </div>
    <div class="d-flex justify-content-center pt-4 pb-3">
    <a href="{{ url('/') }}" class="btn btn-dark">Voir encore plus de films</a>
</div>
</div>


</div>


@endsection
