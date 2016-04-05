<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/****************   Model binding into route ****************/
Route::pattern('slug', '[0-9a-z-_]+');

/***************    Site routes   ******************/
$language = Request::segment(1) ? Request::segment(1) : 'en';

Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController', ]);
get('/cpanel/register', "Auth\AuthController@getRegister");
post('/cpanel/register', "Auth\AuthController@postRegister");


/**
 * Frontend Routes
 */
Route::group(['prefix' => $language], function ($router) {
    require (__DIR__ . "/Routes/Frontend/Frontend.php");
});

/**
 * Backend Routes
 */
$router->group(['prefix' => 'cpanel', 'middleware' => 'auth'], function ($router) {
    require (__DIR__ . "/Routes/Backend/Cpanel.php");
});
