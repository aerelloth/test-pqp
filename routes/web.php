<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* MOVIES */

// APP

//Affichage tous
Route::get('/', [MovieController::class, 'displayAll'])->name('home');

//Détail film
Route::get('/movies/infos/{id}', [MovieController::class, 'displayOne'])->name('movies_infos');



// ADMIN : routes nécessitant d'être connecté et d'avoir la permission admin //

Route::middleware(['check.admin'])->group(function () {

    //Listing
    Route::get('/movies/listing', [MovieController::class, 'index'])->name('movies_listing');

    //Détail film (formulaire)
    Route::get('/movies/detail/{id}', [MovieController::class, 'show'])->name('movies_detail');

    //Suppression film
    Route::get('/movies/delete/{id}', [MovieController::class, 'destroy']);

    //Import films
    Route::get('/movies/import', [MovieController::class, 'import']);
});
