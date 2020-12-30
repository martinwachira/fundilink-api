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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//users api's here
Route::prefix('/user')->group(function(){
    Route::post('/register', 'api\UsersController@register');
    Route::post('/login', 'api\UsersController@login');
    Route::middleware('auth')->get('/all-users', 'api\UsersController@getUsers');
});
Route::get('/all', 'api\UsersController@index');
