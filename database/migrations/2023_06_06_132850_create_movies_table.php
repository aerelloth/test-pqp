<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->boolean('adult');
            $table->string('backdrop_path');
            $table->string('belongs_to_collection')->nullable();
            $table->integer('budget');
            $table->json('genres'); //TBD
            $table->string('homepage');
            $table->integer('api_id');
            $table->string('imdb_id');
            $table->string('original_language');
            $table->string('original_title');
            $table->text('overview');
            $table->decimal('popularity');
            $table->string('poster_path');
            $table->json('production_companies'); //TBD
            $table->json('production_countries'); //TBD
            $table->date('release_date');
            $table->integer('revenue');
            $table->float('runtime');
            $table->json('spoken_languages'); //TBD
            $table->string('status');
            $table->string('tagline');
            $table->string('title');
            $table->boolean('video');
            $table->float('vote_average');
            $table->integer('vote_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
