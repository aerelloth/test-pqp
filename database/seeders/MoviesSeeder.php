<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie = new Movie();
        $movie->adult = false;
        $movie->backdrop_path = "/hZkgoQYus5vegHoetLkCJzb17zJ.jpg";
        $movie->belongs_to_collection = null;
        $movie->budget = 63000000;
        $movie->genres = '[
            {
              "id": 18,
              "name": "Drama"
            },
            {
              "id": 53,
              "name": "Thriller"
            },
            {
              "id": 35,
              "name": "Comedy"
            }
          ]';
        $movie->homepage = "http://www.foxmovies.com/movies/fight-club";
        $movie->api_id = 550;
        $movie->imdb_id = "tt0137523";
        $movie->original_language = "en";
        $movie->original_title = "Fight Club";
        $movie->overview = "A ticking-time-bomb insomniac and a slippery soap salesman channel primal male aggression into a shocking new form of therapy. Their concept catches on, with underground \"fight clubs\" forming in every town, until an eccentric gets in the way and ignites an out-of-control spiral toward oblivion.";
        $movie->popularity = "61.416";
        $movie->poster_path = "/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg";
        $movie->production_companies = '[
            {
              "id": 508,
              "logo_path": "/7cxRWzi4LsVm4Utfpr1hfARNurT.png",
              "name": "Regency Enterprises",
              "origin_country": "US"
            },
            {
              "id": 711,
              "logo_path": "/tEiIH5QesdheJmDAqQwvtN60727.png",
              "name": "Fox 2000 Pictures",
              "origin_country": "US"
            },
            {
              "id": 20555,
              "logo_path": "/hD8yEGUBlHOcfHYbujp71vD8gZp.png",
              "name": "Taurus Film",
              "origin_country": "DE"
            },
            {
              "id": 54051,
              "logo_path": null,
              "name": "Atman Entertainment",
              "origin_country": ""
            },
            {
              "id": 54052,
              "logo_path": null,
              "name": "Knickerbocker Films",
              "origin_country": "US"
            },
            {
              "id": 4700,
              "logo_path": "/A32wmjrs9Psf4zw0uaixF0GXfxq.png",
              "name": "The Linson Company",
              "origin_country": "US"
            },
            {
              "id": 25,
              "logo_path": "/qZCc1lty5FzX30aOCVRBLzaVmcp.png",
              "name": "20th Century Fox",
              "origin_country": "US"
            }
          ]';
        $movie->production_countries = '[
            {
              "iso_3166_1": "US",
              "name": "United States of America"
            }
          ]';
        $movie->release_date = "1999-10-15";
        $movie->revenue = 100853753;
        $movie->runtime = 139;
        $movie->spoken_languages = ' [
            {
              "english_name": "English",
              "iso_639_1": "en",
              "name": "English"
            }
          ]';
        $movie->status = "Released";
        $movie->tagline = "Mischief. Mayhem. Soap.";
        $movie->title = "Fight Club";
        $movie->video = false;
        $movie->vote_average = 8.433;
        $movie->vote_count = 26280;
        
        $movie->save();
    }
}
