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
Route::group(['middleware' => 'auth'], function() {
    
Route::get('/', 'HomeController@getHome');

Route::any('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow');

Route::get('catalog/create', 'CatalogController@getCreate');

Route::any('catalog/save', 'CatalogController@save');

Route::any('catalog/update', 'CatalogController@update');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit');

Route::put('catalog/rent/{id}', 'CatalogController@putRent');

Route::put('catalog/return/{id}', 'CatalogController@putReturn');

Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie');

});
Auth::routes();
Route::get('/home', 'HomeController@index');
