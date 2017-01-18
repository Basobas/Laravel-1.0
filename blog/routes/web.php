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

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/matches', function () {
    return view('pages.matches');
});

//Route::get('images', function () {
//    return view('pages.images');
//});



Route::get('/images/upload', function(){
    return view('pages.upload');
});

Route::get('/images/edit', function () {
    return view('pages.edit');
});

Route::get('image/edit/{id}', ['as' => 'images.edit', 'uses' => 'ImagesController@edit']);
Route::post('image/edit/{id}', ['as' => 'images.edit', 'uses' => 'ImagesController@ImageUpdate']);

Route::get('/images', ['as' => 'images', 'uses' => 'ImagesController@index']);
Route::get('/images/myimages', 'ImagesController@userImages');


Route::get('image/details/{id}', 'ImagesController@imageDetails');


Route::get('/home', 'HomeController@index');

//Route::post('/like', 'ImagesController@Like');

Route::post('/imageLike', ['as' => 'like', 'uses' => 'ImagesController@imageLike']);



Route::post('/ImageActive', ['as' => 'active', 'uses' => 'ImagesController@ImageActive']);


Route::post('/save_image', ['as' => 'images.store', 'uses' => 'ImagesController@store']);

//Route::post(/)


Route::get('/ratings/{id}', 'ImagesController@ratingsImage');


Auth::routes();
