@extends('layouts.bootstrap.layout')

@section('content')

<h1 class="pt-3 pb-3 text-center">Détail</h1>

@foreach ($movie->getAttributes() as $key => $value)
    <p><b>{{ $key }} :</b> {{ $value }}</p>
@endforeach


@endsection
