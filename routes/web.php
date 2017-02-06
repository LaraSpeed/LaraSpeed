<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('film/updateDirector/{film}', 'FilmController@updateDirector');
Route::post('director/addFilm/{director}', 'DirectorController@addFilm');
Route::get('film/related/{film}', 'FilmController@related');
Route::get('film/search', 'FilmController@search');
Route::get('film/sort', 'FilmController@sort');
Route::resource('film', 'FilmController');
Route::get('director/related/{director}', 'DirectorController@related');
Route::get('director/search', 'DirectorController@search');
Route::get('director/sort', 'DirectorController@sort');
Route::resource('director', 'DirectorController');
