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
Route::post('actor/addFilm/{actor}', 'ActorController@addFilm');
Route::post('film/addActor/{film}', 'FilmController@addActor');
Route::get('actor/related/{actor}', 'ActorController@related');
Route::get('actor/search', 'ActorController@search');
Route::get('actor/sort', 'ActorController@sort');
Route::resource('actor', 'ActorController');
Route::post('film/addInventory/{film}', 'FilmController@addInventory');
Route::post('inventory/updateFilm/{inventory}', 'InventoryController@updateFilm');
Route::post('inventory/addCustomer/{inventory}', 'InventoryController@addCustomer');
Route::post('customer/addInventory/{customer}', 'CustomerController@addInventory');
Route::post('customer/addPayment/{customer}', 'CustomerController@addPayment');
Route::post('customer/updateAddress/{customer}', 'CustomerController@updateAddress');
Route::post('rental/addPayment/{rental}', 'RentalController@addPayment');
Route::post('rental/updateStaff/{rental}', 'RentalController@updateStaff');
Route::post('payment/updateRental/{payment}', 'PaymentController@updateRental');
Route::post('payment/updateCustomer/{payment}', 'PaymentController@updateCustomer');
Route::post('address/addCustomer/{address}', 'AddressController@addCustomer');
Route::post('address/addStaff/{address}', 'AddressController@addStaff');
Route::post('address/updateCity/{address}', 'AddressController@updateCity');
Route::post('city/addAddress/{city}', 'CityController@addAddress');
Route::post('city/updateCountry/{city}', 'CityController@updateCountry');
Route::post('country/addCity/{country}', 'CountryController@addCity');
Route::post('staff/addRental/{staff}', 'StaffController@addRental');
Route::post('staff/updateAddress/{staff}', 'StaffController@updateAddress');
Route::post('staff/addAddress/{staff}', 'StaffController@addAddress');
Route::get('inventory/related/{inventory}', 'InventoryController@related');
Route::get('inventory/search', 'InventoryController@search');
Route::get('inventory/sort', 'InventoryController@sort');
Route::resource('inventory', 'InventoryController');
Route::get('customer/related/{customer}', 'CustomerController@related');
Route::get('customer/search', 'CustomerController@search');
Route::get('customer/sort', 'CustomerController@sort');
Route::resource('customer', 'CustomerController');
Route::get('rental/related/{rental}', 'RentalController@related');
Route::get('rental/search', 'RentalController@search');
Route::get('rental/sort', 'RentalController@sort');
Route::resource('rental', 'RentalController');
Route::get('payment/related/{payment}', 'PaymentController@related');
Route::get('payment/search', 'PaymentController@search');
Route::get('payment/sort', 'PaymentController@sort');
Route::resource('payment', 'PaymentController');
Route::get('address/related/{address}', 'AddressController@related');
Route::get('address/search', 'AddressController@search');
Route::get('address/sort', 'AddressController@sort');
Route::resource('address', 'AddressController');
Route::get('city/related/{city}', 'CityController@related');
Route::get('city/search', 'CityController@search');
Route::get('city/sort', 'CityController@sort');
Route::resource('city', 'CityController');
Route::get('country/related/{country}', 'CountryController@related');
Route::get('country/search', 'CountryController@search');
Route::get('country/sort', 'CountryController@sort');
Route::resource('country', 'CountryController');
Route::get('store/related/{store}', 'StoreController@related');
Route::get('store/search', 'StoreController@search');
Route::get('store/sort', 'StoreController@sort');
Route::resource('store', 'StoreController');
Route::get('staff/related/{staff}', 'StaffController@related');
Route::get('staff/search', 'StaffController@search');
Route::get('staff/sort', 'StaffController@sort');
Route::resource('staff', 'StaffController');
