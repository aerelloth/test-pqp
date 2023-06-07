<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;
use App\Models\ApiConfig;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Pagination\LengthAwarePaginator;


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
     * Display a listing of the resource (viewer format).
     */
    public function displayAll()
    {
        $api_config = ApiConfig::orderBy('updated_at', 'DESC')->first();
        $movies = Movie::orderByDesc('updated_at')->paginate(12);
        return view('movies/display-all', compact('movies', 'api_config'));
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
     * Display the specified resource (viewer format).
     */
    public function displayOne(string $id)
    {
        $api_config = ApiConfig::orderBy('updated_at', 'DESC')->first();
        $movie = Movie::find($id);
        if (is_null($movie)) {
            return redirect()->route('home');
        }
        return view('movies.display-one', compact('movie', 'api_config'));
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
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->back()->with('success', 'Le film a été supprimé avec succès.');
    }

     /**
     * Imports movies from the TheMovieDB API
     */
    public function import()
    {
        $apiKey = config('api.api_key');
        $apiUrl = config('api.api_url');
        $apiVerify = config('api.api_verify');

        $client = new GuzzleClient();
        try {
                $response = $client->request('GET', $apiUrl.'trending/movie/day?language=fr', [
                    RequestOptions::VERIFY => $apiVerify,
                    'headers' => [
                    'Authorization' => 'Bearer '.$apiKey,
                    'accept' => 'application/json',
                  ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            foreach ($data['results'] as $movie) {

                $movie['api_id'] = $movie['id'];
                $addedMovie = $this->addToDb($movie);
            }
            return redirect()->route('movies_listing')->with('success', 'Les films du jour ont été ajoutés avec succès');
        }
        catch (GuzzleException $e) {
            //par la suite, ajouter le log en BDD et/ou l'envoyer par mail à l'admin
            //echo $e;
        }
    }

    public function addToDb(array $movie) {

        $validator = Validator::make($movie, [
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
            //par la suite, ajouter le log en BDD et/ou l'envoyer par mail à l'admin
            return false;
        }
        else {
            //ajouter le film en BDD ou le mettre à jour s'il existe déjà avec le même api_id
            return $movie = Movie::updateOrCreate(['api_id' => $movie['api_id']], $movie);
        }
    }
}
