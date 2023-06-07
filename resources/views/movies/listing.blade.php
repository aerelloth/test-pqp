@extends('layouts.bootstrap.layout')

@section('content')

<div class="text-center">
    <h1 class="pt-3 pb-5">Tous les films</h1>

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
                    <a href="{{ url('/detail', ['id' => $movie->id]) }}"><i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url('/delete', ['id' => $movie->id]) }}"><i class="bi bi-x-square"></i></a>
                </td>
                @foreach ($movie->getAttributes() as $value)
                    <td>{{ \Illuminate\Support\Str::limit($value, 100) }}</td>
                @endforeach
            </tr>

            @endforeach
        </tbody>

    </table>
@endif
</div>



@endsection

