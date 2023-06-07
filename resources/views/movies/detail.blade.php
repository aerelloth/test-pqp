@extends('layouts.bootstrap.layout')

@section('content')

<h1 class="pt-3 pb-3 fw-bold text-center">Détail</h1>

<div class="mb-3">
    <h2 class="fw-semibold">{{$movie->title}}</h2>
    <img src="{{$api_config->images_secure_base_url.'w500'.$movie->backdrop_path}}" alt="{{$movie->title}}">
</div>

@foreach ($movie->getAttributes() as $key => $value)
    <p><b>{{ $key }} :</b> {{ $value }}</p>
@endforeach

<a href="{{ route('movies_infos', ['id' => $movie->id]) }}" class="btn btn-outline-secondary mt-3">Fiche public</a>

<a href="{{ route('movies_listing') }}" class="btn btn-secondary mt-3">Retour</a>

@endsection
