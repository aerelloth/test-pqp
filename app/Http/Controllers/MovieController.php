<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies/listing', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'adult' => 'nullable|boolean',
            'backdrop_path' => 'nullable|string',
            'belongs_to_collection' => 'nullable|string',
            'budget' => 'nullable|numeric',
            'genres' => 'nullable|string',
            'homepage' => 'nullable|string',
            'api_id' => 'nullable|integer',
            'imdb_id' => 'nullable|string',
            'original_language' => 'nullable|string',
            'original_title' => 'nullable|string',
            'overview' => 'nullable|string',
            'popularity' => 'nullable|numeric',
            'poster_path' => 'nullable|string',
            'production_companies' => 'nullable|string',
            'production_countries' => 'nullable|string',
            'release_date' => 'nullable|date',
            'revenue' => 'nullable|numeric',
            'runtime' => 'nullable|integer',
            'spoken_languages' => 'nullable|string',
            'status' => 'nullable|string',
            'tagline' => 'nullable|string',
            'title' => 'required|string',
            'video' => 'nullable|boolean',
            'vote_average' => 'nullable|numeric',
            'vote_count' => 'nullable|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $movie = Movie::create($data);

        return redirect()->back()->with('success', 'Le film a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        if (is_null($movie)) {
            return redirect()->route('movies_listing');
        }
        return view('movies.detail', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
