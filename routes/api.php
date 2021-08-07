<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('hello','TestController@helloWorld') ;
Route::post('hello','TestController@helloWorldPost') ;


Route::group(['middleware'=>'auth:api', 'namespace'=>'Api'],function (){
    Route::get('user/{user_id?}','UserController@getUser');
    Route::post('user','UserController@postUser');
    Route::put('user','UserController@putUser');
    Route::delete('user','UserController@deleteUser');
    Route::post('register','AuthController@register') ;
    // get my data or my friend profile
    Route::get('profile/{id?}','UserController@profile');
    //add post
    Route::post('addPost','PostController@addPost');
    //Route::post('addPost','PostController@addPost');
    //show own post and data (like, comment,user )
    Route::post('postPage','PostController@postPostpage');
    // get All  Post
    Route::get('timeLine','PostController@timeLine');
    //add favourite
    Route::post('addfavourite','FavouritController@addFavourit');
    //favouritePost
    Route::get('favourite/{id?}','FavouritController@favouritePost');
    //get friends
    Route::get('friend/{id?}','FriendController@friend');

     Route::post('friendPost','FriendController@friendPost');
     //forget password
    Route::post('forgetPassword','ForgetController@forget');
});