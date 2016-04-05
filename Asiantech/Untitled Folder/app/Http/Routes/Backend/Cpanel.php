<?php

/***************    Admin routes  ******************/

    $router->get('logout', "Auth\AuthController@getLogout");
    $router->get('changepw', "Admin\UserController@changepw");
    $router->post('changepw', "Admin\UserController@updatepw");

    # Admin Dashboard
    $router->get('/', 'Admin\DashboardController@index');
    $router->get('dashboard', 'Admin\DashboardController@index');

    # Configuration
    $router->get('/config', 'Admin\SettingController@index');
    $router->post('/config', 'Admin\SettingController@store');
    $router->resource('/config', 'Admin\SettingController');

    # Languages
    $router->get('languages/{languages}/delete', 'Admin\LanguageController@delete');
    $router->post('languages/create', 'Admin\LanguageController@store');
    $router->resource('languages', 'Admin\LanguageController');

    # Users
    $router->get('user/data', 'Admin\UserController@data');
    $router->get('user/{user}/show', 'Admin\UserController@show');
    $router->get('user/{user}/edit', 'Admin\UserController@edit');
    $router->get('user/{user}/delete', 'Admin\UserController@delete');
    $router->post('user/create', 'Admin\UserController@store');
    $router->resource('user', 'Admin\UserController');

    # Users
    $router->get('groupuser/data', 'Admin\GroupUserController@data');
    $router->get('groupuser/{groupuser}/delete', 'Admin\GroupUserController@delete');
    $router->resource('groupuser', 'Admin\GroupUserController');

    # Contact
    $router->get('contact/{contact}/show', 'Admin\ContactController@show');
    $router->get('contact/{contact}/delete', 'Admin\ContactController@delete');
    $router->resource('contact', 'Admin\ContactController');

