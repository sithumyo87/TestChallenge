<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\Viewer\MovieController::class, 'index'])->name('movie');
Route::get('/movieDetail/{id}', [App\Http\Controllers\Viewer\MovieDetailController::class, 'index'])->name('movieDetail');
Route::post('/movieDetail/comment/{movieId}', [App\Http\Controllers\Viewer\CommentController::class, 'comment']);


// Routes after Login
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'], function() {
    Route::resource('movie', MovieController::class);
    Route::resource('genre', GenreController::class);
});



