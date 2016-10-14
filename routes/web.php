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

Route::get('film/related./film', 'FilmController@related');
Route::get('language/related./language', 'LanguageController@related');
Route::get('category/related./category', 'CategoryController@related');
Route::get('film/related./film', 'FilmController@related');
Route::get('language/related./language', 'LanguageController@related');
Route::get('category/related./category', 'CategoryController@related');

Route::resource('film', 'FilmController');
Route::resource('acteur', 'ActeurController');
Route::resource('language', 'LanguageController');
Route::resource('film_category', 'Film_categoryController');
Route::resource('category', 'CategoryController');
Route::resource('config', 'ConfigController');Route::get('film/related/{film}', 'FilmController@related');
Route::get('language/related/{language}', 'LanguageController@related');
Route::get('category/related/{category}', 'CategoryController@related');
