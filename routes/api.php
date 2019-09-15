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

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/current-user', 'API\DataController@user');
    Route::post('/test-notification', 'API\NotificationsController@notify');
    Route::get('/notifications', 'API\NotificationsController@all');
    Route::get('/mark-notifications', 'API\NotificationsController@read');
    Route::post('/upload', 'API\StorageController@put');
    Route::get('/get-upload', 'API\StorageController@get');
});

Route::apiResource('/users', "API\UsersController");
Route::apiResource('/hobbies', "API\HobbiesController");
Route::get('/fetch/hobbies', 'API\HobbiesController@fetch');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/verify/user', 'API\VerifyUserController@verify');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
