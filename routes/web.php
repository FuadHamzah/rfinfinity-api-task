<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\PerformerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('genre', [GenreController::class, 'show'])->name('genre.show');
    Route::get('timeslot', [TimeslotController::class, 'show'])->name('timeslot.show');
    Route::get('specific_movie_theater', [TimeslotController::class, 'specific_theater'])->name('timeslot.specific');
    Route::get('new_movies', [RatingController::class, 'show'])->name('rating.show');
    Route::get('search_performer', [PerformerController::class, 'show'])->name('performer.show');
    Route::post('give_rating', [RatingController::class, 'store'])->name('rating.store');
    Route::post('add_movie', [MovieController::class, 'store'])->name('movie.store');
});



