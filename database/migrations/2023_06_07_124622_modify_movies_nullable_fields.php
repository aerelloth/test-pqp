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
        Schema::table('movies', function (Blueprint $table) {
            $table->boolean('adult')->nullable()->change();
            $table->string('backdrop_path')->nullable()->change();
            $table->integer('budget')->nullable()->change();
            $table->json('genres')->nullable()->change();
            $table->string('homepage')->nullable()->change();
            $table->integer('api_id')->nullable()->change();
            $table->string('imdb_id')->nullable()->change();
            $table->string('original_language')->nullable()->change();
            $table->string('original_title')->nullable()->change();
            $table->text('overview')->nullable()->change();
            $table->decimal('popularity')->nullable()->change();
            $table->string('poster_path')->nullable()->change();
            $table->json('production_companies')->nullable()->change();
            $table->json('production_countries')->nullable()->change();
            $table->date('release_date')->nullable()->change();
            $table->integer('revenue')->nullable()->change();
            $table->float('runtime')->nullable()->change();
            $table->json('spoken_languages')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('tagline')->nullable()->change();
            $table->boolean('video')->nullable()->change();
            $table->float('vote_average')->nullable()->change();
            $table->integer('vote_count')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->boolean('adult')->change();
            $table->string('backdrop_path')->change();
            $table->integer('budget')->change();
            $table->json('genres')->change();
            $table->string('homepage')->change();
            $table->integer('api_id')->change();
            $table->string('imdb_id')->change();
            $table->string('original_language')->change();
            $table->string('original_title')->change();
            $table->text('overview')->change();
            $table->decimal('popularity')->change();
            $table->string('poster_path')->change();
            $table->json('production_companies')->change();
            $table->json('production_countries')->change();
            $table->date('release_date')->change();
            $table->integer('revenue')->change();
            $table->float('runtime')->change();
            $table->json('spoken_languages')->change();
            $table->string('status')->change();
            $table->string('tagline')->change();
            $table->boolean('video')->change();
            $table->float('vote_average')->change();
            $table->integer('vote_count')->change();
        });
    }
};
