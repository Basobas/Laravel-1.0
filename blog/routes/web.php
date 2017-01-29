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
Route::get('/images', ['as' => 'images.search', 'uses' => 'ImagesController@index']);
Route::post('/imageLike', ['as' => 'like', 'uses' => 'ImagesController@imageLike']);

//Details and ratings for image
Route::get('image/details/{id}', 'ImagesController@imageDetails');
Route::get('/ratings/{id}', 'ImagesController@ratingsImage');


//Upload
Route::post('/save_image', ['as' => 'images.store', 'uses' => 'ImagesController@store']);

//Admin routes
Route::get('/admin', 'AdminController@index');
Route::post('/userActive', ['as' => 'active', 'uses' => 'ImagesController@adminActive']);


Route::get('/home', 'HomeController@index');

Route::get('/', 'HomeController@index');

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/matches', function () {
    return view('pages.matches');
});


Route::get('/images/upload', 'ImagesController@imageUpload');


Auth::routes();
