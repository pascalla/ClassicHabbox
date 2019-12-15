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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/staff', 'RaresController@index');
Route::resource('staff/rares', 'RaresController');
Route::resource('staff/prices', 'PricesController');
Route::resource('staff/categories', 'CategoriesController');
