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
        Schema::create('api_configs', function (Blueprint $table) {
            $table->id();
            $table->string('images_base_url');
            $table->string('images_secure_base_url');
            $table->json('images_backdrop_sizes');
            $table->json('images_logo_sizes');
            $table->json('images_poster_sizes');
            $table->json('images_profile_sizes');
            $table->json('images_still_sizes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_configs');
    }
};
