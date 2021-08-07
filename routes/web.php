<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'Auth\postController@index')->middleware('auth');
Route::get('/post/{id}', 'Auth\postController@show')->name('post.show');
Route::get('/post/{id}/edit', 'Auth\postController@edit')->name('post.edit')->middleware('auth');
Route::put('/post/{id}/edit', 'Auth\postController@update')->name('update.edit')->middleware('auth');
Route::post('/insertPost', 'Auth\postController@store');
