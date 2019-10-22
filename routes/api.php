<?php

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

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');

Route::group(['middleware' => ['api.auth']], function () {
    Route::get('user-info', 'API\UserController@info');
    Route::patch('edit-user', 'API\Usercontroller@update');
    Route::post('logout', 'API\AuthController@logout');

    Route::post('insert-push-token', 'API\PushTokenController@store');
    Route::delete('delete-push-token', 'API\PushTokenController@delete');

    Route::post('insert-post', 'API\PostsController@insert');

    Route::post('add-flight', 'API\FlightController@addFlight');
});

