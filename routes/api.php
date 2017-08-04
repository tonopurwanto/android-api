<?php

use Illuminate\Http\Request;

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

Route::post('login', 'AuthenticateController@login');
Route::post('register', 'AuthenticateController@register');

/** Using \Tymon\JWTAuth provider */
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('user', function(Request $request) {
        return $request->user();
    });

    Route::get('books', 'BookController@index');
    Route::get('books/{book}', 'BookController@show');
    Route::get('customers', 'CustomerController@index');
});

/** Using default laravel auth provider */
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
