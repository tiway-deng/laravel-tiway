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

Route::post('user/login', 'App\Http\Controllers\UserController@login');
Route::post('user/register', 'App\Http\Controllers\UserController@register');

Route::group(['middleware' => 'jwt', 'prefix' => 'user'], function () {
    Route::get('info', 'App\Http\Controllers\UserController@getUser');
});

Route::get('user/test', function () {

        $user = \App\Service\GrpcUser::getUserById(1);
        dd($user);

    });




