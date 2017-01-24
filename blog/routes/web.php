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

//routes image edit
Route::get('image/edit/{id}', ['as' => 'images.edit', 'uses' => 'ImagesController@edit']);
Route::post('image/edit/{id}', ['as' => 'images.edit', 'uses' => 'ImagesController@ImageUpdate']);

//routes my image
Route::get('/images/myimages', 'ImagesController@userImages');
Route::post('/ImageActive', ['as' => 'active', 'uses' => 'ImagesController@ImageActive']);

//route all images
//Route::get('/images', ['as' => 'images', 'uses' => 'ImagesController@index']);
Route::get('/images', ['as' => 'images.search', 'uses' => 'ImagesController@index']);
Route::post('/imageLike', ['as' => 'like', 'uses' => 'ImagesController@imageLike']);

//Details and ratings for image
Route::get('image/details/{id}', 'ImagesController@imageDetails');
Route::get('/ratings/{id}', 'ImagesController@ratingsImage');


//upload
Route::post('/save_image', ['as' => 'images.store', 'uses' => 'ImagesController@store']);


Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/matches', function () {
    return view('pages.matches');
});


Route::get('/images/upload', function(){
    return view('pages.upload');
});


Auth::routes();
