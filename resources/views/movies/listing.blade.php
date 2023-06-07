@extends('layouts.bootstrap.layout')

@section('content')

<div class="text-center">
    <h1 class="pt-3 pb-3">Tous les films</h1>

    <a href="{{ url('/movies/add') }}" class="btn btn-outline-secondary mb-3 disabled"><i class="bi bi-plus-square"></i> Ajouter un film</a>
    @if ($movies->isEmpty())
        <p>Il n'y a encore aucun film enregistré.</p>
    @else
        <table id="listing" class="dataTable table table-bordered thead-light">
            <thead>
                <tr>
                    <th data-column-index="0"></th>
                    @foreach ($movies->first()->getAttributes() as $attribute => $value)
                        <th>{{ $attribute }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>
                    <td>
                        <a href="{{ url('/movies/detail', ['id' => $movie->id]) }}" class="text-secondary"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{ url('/movies/delete', ['id' => $movie->id]) }}" class="confirmation-required text-secondary"><i class="bi bi-x-square"></i></a>
                    </td>
                    @foreach ($movie->getAttributes() as $key => $value)
                        <td>{{ \Illuminate\Support\Str::limit($value, 100) }}
                            @if($key == 'backdrop_path')
                                <img src="{{$api_config->images_secure_base_url.'w300'.$movie->backdrop_path}}" class="mt-1" alt="{{$movie->title}}">
                            @elseif($key == 'poster_path')
                                <img src="{{$api_config->images_secure_base_url.'w200'.$movie->poster_path}}" class="mt-1" style="max-height: 200px;" alt="{{$movie->title}}">
                            @endif
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>



@endsection

