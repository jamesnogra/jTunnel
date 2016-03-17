<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'UserController@index');
    Route::get('/pricing', 'UserController@pricing');
    Route::get('/installation', 'UserController@installation');
    Route::get('/contact-us', 'UserController@contact_us');
    Route::get('/about-us', 'UserController@about_us');
    Route::get('/terms', 'UserController@terms');
    Route::get('/privacy', 'UserController@privacy');

    Route::get('/register-user', 'UserController@register');
    Route::post('/register-user', 'UserController@postRegister');
    Route::get('/register-continue/{token}', 'UserController@registerContinue');
    Route::post('/register-continue', 'UserController@postRegisterContinue');
    Route::get('/login', 'UserController@login');
    Route::post('/login', 'UserController@postLogin');
    Route::get('/logout', 'UserController@logout');

    Route::get('/my-tunnels', 'UserController@myTunnels'); 
});