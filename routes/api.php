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
});

Route::apiResource('/users', "API\UsersController");
Route::apiResource('/hobbies', "API\HobbiesController");
Route::get('/fetch/hobbies', 'API\HobbiesController@fetch');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/register', 'Auth\RegisterController@register');
Route::post('/verify/user', 'API\VerifyUserController@verify');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
