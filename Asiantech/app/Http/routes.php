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

Route::get('/', 'HomeController@index');

Route::group(['prefix' => $language], function () {
    Route::get('/', 'HomeController@home');
    Route::get('index', 'HomeController@home');
    /***************    Page About   ******************/
    Route::get('about', 'AboutController@index');

    /***************    Page Off   ******************/
    Route::get('offshore-development', 'OffShoreDevController@index');

    /***************    Page About   ******************/
    Route::get('service', 'ServiceController@index');
    Route::get('service-detail/{slug}', 'ServiceController@detail');

    /***************    Page About   ******************/
    Route::get('team', 'TeamController@index');

    /***************    Company Profile   ******************/
    Route::get('outline', 'ProfileController@index');

    /***************    Privacy Policy    ******************/
    Route::get('privacy-policy', 'PolicyController@index');

    /***************    Privacy Policy    ******************/
    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@store');
    /***************    Privacy Policy    ******************/

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/***************    Admin routes  ******************/
Route::group(['prefix' => 'cpanel', 'middleware' => 'auth'], function () {
    Route::get('logout', "Auth\AuthController@getLogout");
    Route::get('changepw', "Admin\UserController@changepw");
    Route::post('changepw', "Admin\UserController@updatepw");

    # Admin Dashboard
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('dashboard', 'Admin\DashboardController@index');

    # Languages
    Route::resource('languages', 'Admin\LanguageController');
        Route::group(['prefix' => 'languages'], function () {
            Route::get('create', ['uses' => 'Admin\LanguageController@create', 'middleware' => ['acl:languages_create']]);
            Route::post('create', ['uses' => 'Admin\LanguageController@store', 'middleware' => ['acl:languages_create']]);
            Route::get('{languages}/delete', ['uses' => 'Admin\LanguageController@delete', ['middleware' => 'acl:languages_delete']]);
        });

    # Static page
        Route::resource('staticpage', 'Admin\PageController');
        Route::group(['prefix' => 'staticpage'], function () {
            Route::get('create', ['uses' => 'Admin\PageController@create', 'middleware' => ['acl:staticpage_create']]);
            Route::post('create', ['uses' => 'Admin\PageController@store', 'middleware' => ['acl:staticpage_create']]);
            Route::get('{staticpage}/disable', ['uses' => 'Admin\PageController@disable', 'middleware' => ['acl:staticpage_update']]);
            Route::get('{staticpage}/active', ['uses' => 'Admin\PageController@active', 'middleware' => ['acl:staticpage_update']]);
            Route::get('{staticpage}/update', ['uses' => 'Admin\PageController@update', 'middleware' => ['acl:staticpage_update']]);
            Route::post('update', ['uses' => 'Admin\PageController@store', 'middleware' => ['acl:staticpage_update']]);
            Route::get('{staticpage}/delete', ['uses' => 'Admin\PageController@delete', 'middleware' => ['acl:staticpage_delete']]);

        });

    # Service
        Route::resource('service', 'Admin\ServiceController');
        Route::group(['prefix' => 'service'], function () {
            Route::get('{service}/disable', ['uses' => 'Admin\ServiceController@disable', 'middleware' => ['acl:service_update']]);
            Route::get('{service}/active', ['uses' => 'Admin\ServiceController@active', 'middleware' => ['acl:service_update']]);
            Route::get('{service}/delete', ['uses' => 'Admin\ServiceController@delete', 'middleware' => ['acl:service_delete']]);
            Route::get('{service}/update', ['uses' => 'Admin\ServiceController@update', 'middleware' => ['acl:service_update']]);
            Route::post('update', ['uses' => 'Admin\ServiceController@saveUpdate', 'middleware' => ['acl:service_update']]);
            Route::get('create', ['uses' => 'Admin\ServiceController@create', 'middleware' => ['acl:service_create']]);
            Route::post('create', ['uses' => 'Admin\ServiceController@store', 'middleware' => ['acl:service_create']]);

        });

    # Timeline
        Route::resource('timeline', 'Admin\TimelineController');
        Route::group(['prefix' => 'timeline'], function () {
            Route::get('{timeline}/disable', ['uses' => 'Admin\TimelineController@disable', 'middleware' => ['acl:timeline_update']]);
            Route::get('{timeline}/active', ['uses' => 'Admin\TimelineController@active', 'middleware' => ['acl:timeline_update']]);
            Route::get('{timeline}/delete', ['uses' => 'Admin\TimelineController@delete', 'middleware' => ['acl:timeline_delete']]);
            Route::get('{timeline}/update', ['uses' => 'Admin\TimelineController@update', 'middleware' => ['acl:timeline_update']]);
            Route::post('update', ['uses' => 'Admin\TimelineController@saveUpdate', 'middleware' => ['acl:timeline_update']]);
            Route::get('create', ['uses' => 'Admin\TimelineController@create', 'middleware' => ['acl:timeline_create']]);
            Route::post('create', ['uses' => 'Admin\TimelineController@store', 'middleware' => ['acl:timeline_create']]);
            Route::post('order', ['uses' => 'Admin\TimelineController@updateOrder', 'middleware' => ['acl:timeline_update']]);
        });

    # Team

        Route::resource('team', 'Admin\TeamController');
        Route::group(['prefix' => 'team'], function () {
            Route::get('{team}/delete', ['uses' => 'Admin\TeamController@delete', 'middleware' => ['acl:team_delete']]);
            Route::get('{team}/update', ['uses' => 'Admin\TeamController@update', 'middleware' => ['acl:team_update']]);
            Route::get('create', ['uses' => 'Admin\TeamController@create', 'middleware' => ['acl:team_create']]);
            Route::post('create', ['uses' => 'Admin\TeamController@store', 'middleware' => ['acl:team_create']]);
            Route::post('update', ['uses' => 'Admin\TeamController@saveUpdate', 'middleware' => ['acl:team_update']]);
        });

    # Member
        Route::resource('member', 'Admin\MemberController');
        Route::group(['prefix' => 'member'], function () {
            Route::get('{member}/disable', ['uses' => 'Admin\MemberController@disable', 'middleware' => ['acl:member_update']]);
            Route::get('{member}/active', ['uses' => 'Admin\MemberController@active', 'middleware' => ['acl:member_update']]);
            Route::get('{member}/delete', ['uses' => 'Admin\MemberController@delete', 'middleware' => ['acl:member_delete']]);
            Route::get('{member}/update', ['uses' => 'Admin\MemberController@update', 'middleware' => ['acl:member_update']]);
            Route::post('update', ['uses' => 'Admin\MemberController@saveUpdate', 'middleware' => ['acl:member_update']]);
            Route::get('create', ['uses' => 'Admin\MemberController@create', 'middleware' => ['acl:member_create']]);
            Route::post('create', ['uses' => 'Admin\MemberController@store', 'middleware' => ['acl:member_create']]);
        });

    # Users
        Route::resource('user', 'Admin\UserController');
        Route::group(['prefix' => 'user'], function () {
            Route::get('data', ['uses' => 'Admin\UserController@data', 'middleware' => ['acl:user_update']]);
            Route::get('{user}/show', ['uses' => 'Admin\UserController@show', 'middleware' => ['acl:user_update']]);
            Route::get('{user}/edit', ['uses' => 'Admin\UserController@edit', 'middleware' => ['acl:user_update']]);
            Route::get('{user}/delete', ['uses' => 'Admin\UserController@delete', 'middleware' => ['acl:user_delete']]);
            Route::get('{user}/update', ['uses' => 'Admin\UserController@update', 'middleware' => ['acl:user_update']]);
            Route::get('create', ['uses' => 'Admin\UserController@create', 'middleware' => ['acl:user_create']]);
            Route::post('create', ['uses' => 'Admin\UserController@store', 'middleware' => ['acl:user_create']]);
            Route::post('update', ['uses' => 'Admin\UserController@store', 'middleware' => ['acl:user_update']]);

        });

    # Group Users
        Route::resource('groupuser', 'Admin\GroupUserController');
        Route::group(['prefix' => 'groupuser'], function () {
            Route::get('data', ['uses' => 'Admin\GroupUserController@data', 'middleware' => ['acl:groupuser_create|groupuser_update|groupuser_delete']]);
            Route::get('{groupuser}/delete', ['uses' => 'Admin\GroupUserController@delete', 'middleware' => ['acl:groupuser_delete']]);
            Route::get('{groupuser}/update', ['uses' => 'Admin\GroupUserController@update', 'middleware' => ['acl:groupuser_update']]);
            Route::post('update', ['uses' => 'Admin\GroupUserController@store', 'middleware' => ['acl:groupuser_update']]);
            Route::get('create', ['uses' => 'Admin\GroupUserController@create', 'middleware' => ['acl:groupuser_create']]);
            Route::post('create', ['uses' => 'Admin\GroupUserController@store', 'middleware' => ['acl:groupuser_create']]);
        });

    # Contact
        Route::resource('contact', 'Admin\ContactController');
        Route::group(['prefix' => 'contact'], function () {
            Route::get('{contact}/show', ['uses' => 'Admin\ContactController@show', 'middleware' => ['acl:contact_create|contact_update|contact_delete']]);
            Route::get('{contact}/delete', ['uses' => 'Admin\ContactController@delete', 'middleware' => ['acl:contact_delete']]);
        });
        Route::get('/error/denied', 'Admin\AccessController@index');

});
