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
    return view('home');
});


Route::post('film/clearSearch', 'FilmController@clearSearch');
Route::post('film/updateLanguage/{film}', 'FilmController@updateLanguage');
Route::post('film/addCategory/{film}', 'FilmController@addCategory');
Route::post('language/clearSearch', 'LanguageController@clearSearch');
Route::post('language/addFilm/{language}', 'LanguageController@addFilm');
Route::post('category/clearSearch', 'CategoryController@clearSearch');
Route::post('category/addFilm/{category}', 'CategoryController@addFilm');
Route::post('delivery/clearSearch', 'DeliveryController@clearSearch');
Route::post('delivery/updateFilm/{delivery}', 'DeliveryController@updateFilm');
Route::get('film/related/{film}', 'FilmController@related');
Route::get('film/search', 'FilmController@search');
Route::get('film/sort', 'FilmController@sort');
Route::resource('film', 'FilmController');
Route::get('language/related/{language}', 'LanguageController@related');
Route::get('language/search', 'LanguageController@search');
Route::get('language/sort', 'LanguageController@sort');
Route::resource('language', 'LanguageController');
Route::get('category/related/{category}', 'CategoryController@related');
Route::get('category/search', 'CategoryController@search');
Route::get('category/sort', 'CategoryController@sort');
Route::resource('category', 'CategoryController');
Route::get('delivery/related/{delivery}', 'DeliveryController@related');
Route::get('delivery/search', 'DeliveryController@search');
Route::get('delivery/sort', 'DeliveryController@sort');
Route::resource('delivery', 'DeliveryController');
