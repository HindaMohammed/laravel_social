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
//override to this method in ForgotPasswordController
//
Route::post('forget','Auth\ForgotPasswordController@sendResetLinkEmail') ;
Route::post('register','AuthController@register') ;

Route::group(['middleware'=>'auth:api', 'namespace'=>'Api'],function (){
    Route::get('user/{user_id?}','UserController@getUser');
    Route::post('user','UserController@postUser');
    Route::put('user','UserController@putUser');
    Route::delete('delUser','UserController@deleteUser');


    // get my data or my friend profile
    Route::get('profile/{id?}','UserController@profile');
    //add post
    Route::post('addPost','PostController@addPost');
    //Route::post('addPost','PostController@addPost');
    //show own post and data (like, comment,user )
    Route::post('postPage','PostController@postPostpage');
    // get All  Post with pagination
    Route::post('timeLine','TimeLineController@timeLine');
    //add favourite
    Route::post('addfavourite','FavouritController@addFavourit');
    //favouritePost
    Route::get('favourite/{id?}','FavouritController@favouritePost');
    //get friends
    Route::get('friend/{id?}','FriendController@friend');

    Route::post('friendPost','FriendController@friendPost');
     //forget password
//    Route::post('forgetPassword','ForgetController@forget');
    //logout Auth
    Route::post('logout','LogotController@logout');
    // To view specific post details
    Route::post('home','HomeController@home');
    Route::post('comment','CommentController@postcomment');
});