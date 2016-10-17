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
Route::get('film/related/{film}', 'FilmController@related');
Route::get('film/search', 'FilmController@search');
Route::resource('film', 'FilmController');
Route::get('language/related/{language}', 'LanguageController@related');
Route::get('language/search', 'LanguageController@search');
Route::resource('language', 'LanguageController');
Route::get('category/related/{category}', 'CategoryController@related');
Route::get('category/search', 'CategoryController@search');
Route::resource('category', 'CategoryController');
