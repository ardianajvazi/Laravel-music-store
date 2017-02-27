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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Band routes
Route::get('/bands', 'BandsController@index');

Route::get('/get-band/{id}', 'BandsController@show');

Route::get('/add-band', 'BandsController@addView');

Route::get('/update-band/{id}', 'BandsController@updateView');

Route::get('/get-bands', 'BandsController@getBands');

Route::post('/bands', 'BandsController@store');

Route::post('/bands/{brand_id}', 'BandsController@update');

Route::delete('/bands/{brand_id}', 'BandsController@destroy');


// Album routes
Route::get('/albums', 'AlbumsController@index');

Route::get('/get-albums/{band_name?}', 'AlbumsController@getAlbums');

Route::get('/albums/{band_id}', 'AlbumsController@show');

Route::post('/albums', 'AlbumsController@store');

Route::post('/albums/{album_id}', 'AlbumsController@update');

Route::delete('/albums/{album_id}', 'AlbumsController@destroy');

Route::get('/add-album', 'AlbumsController@addView');

Route::get('/update-album/{id}', 'AlbumsController@updateView');