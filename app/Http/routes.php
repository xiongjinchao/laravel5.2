<?php

/**
 * 前台路由
 */
Route::group(['middleware'=>'web','namespace' => 'Front'], function()
{
    Route::group(['middleware'=>'web'], function()
    {
        Route::get('/', 'HomeController@index');
    });
});

/**
 * 接口路由
 */
Route::group(['prefix'=>'api','namespace' => 'Api'], function()
{
    //&secret=baicheng.com
    //dev.laravel.com/api?methd=ranger.user.get&params=1&key=xiongjinchao&format=json&sign=1&token=A2DE32DE561YGJ09
    Route::get('/', 'HomeController@index');
});


/**
 * 会员中心路由
 */
Route::group(['prefix'=>'account','namespace' => 'Account'], function()
{
    Route::auth();

    Route::group(['middleware'=>'auth:web'], function()
    {
        Route::get('/', 'HomeController@index');
    });
});


/**
 * 后台路由
 */
Route::group(['prefix'=>'admin','namespace' => 'Admin'], function()
{
    Route::auth();
    
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::group(['middleware'=>'auth:admin'], function()
    {
        Route::get('/', 'HomeController@index');
        Route::get('locker', 'HomeController@locker');
        Route::post('unlock', 'HomeController@unlock');

        Route::resource('article', 'ArticleController');
        Route::resource('employee', 'EmployeeController');
        Route::resource('user', 'UserController');
    });
});
