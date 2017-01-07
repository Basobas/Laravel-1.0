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

Route::get('about', function () {
    return view('pages.about');
});

Route::get('matches', function () {
    return view('pages.matches');
});

Route::get('images', function () {
    return view('pages.images');
});

Route::get('/images/upload', 'ImagesController@edit');

Route::get('/images', 'ImagesController@index');


Route::get('/home', 'HomeController@index');

//
//Route::get('images',
//    ['as' => 'images', 'uses' => 'ImagesController@upload']);
//
//
Route::post('images', ['as' => 'images.store', 'uses' => 'ImagesController@store']);


Auth::routes();