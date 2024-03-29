<?php

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

// API (services)
Route::get('/api/rares', 'RaresService@index');
Route::get('/api/rares/category/{category}', 'RaresService@getByCategory');
Route::get('/api/rares/released', 'RaresService@getByReleased');
Route::get('/api/badges', 'BadgesService@index');

// Panel
Auth::routes(['register' => false]);
//Auth::routes();
Route::get('/staff', 'RaresController@index');
Route::resource('staff/rares', 'RaresController');
Route::resource('staff/prices', 'PricesController');
Route::resource('staff/rare_types', 'RareTypesController');
Route::resource('staff/categories', 'CategoriesController');
Route::resource('staff/badges', 'BadgesController');

// Pages
Route::get('/{any}', 'HomeController@index')->where('any', '.*');
