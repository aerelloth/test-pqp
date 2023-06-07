<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected const ATTRIBUTES = [
        'adult',
        'backdrop_path',
        'belongs_to_collection',
        'budget',
        'genres',
        'homepage',
        'api_id',
        'imdb_id',
        'original_language',
        'original_title',
        'overview',
        'popularity',
        'poster_path',
        'production_companies',
        'production_countries',
        'release_date',
        'revenue',
        'runtime',
        'spoken_languages',
        'status',
        'tagline',
        'title',
        'video',
        'vote_average',
        'vote_count'
    ];

    protected $fillable = self::ATTRIBUTES;

    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setDefaultAttributes();
    }

    protected function setDefaultAttributes()
    {
        foreach (self::ATTRIBUTES as $attribute) {
            $this->attributes[$attribute] = null;
        }
    }
}
