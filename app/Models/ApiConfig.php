<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'images_base_url',
        'images_secure_base_url',
        'images_backdrop_sizes',
        'images_logo_sizes',
        'images_poster_sizes',
        'images_profile_sizes',
        'images_still_sizes'
    ];
}
