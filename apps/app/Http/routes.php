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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'AuthenController@index');
    Route::get('/login', 'AuthenController@authen');
    Route::get('/logout', 'AuthenController@logout');
    Route::any('/checkAuth', 'AuthenController@checkAuth');
    Route::get('/dashboard', 'DashboardController@index');
    
    Route::get('/listMenu', 'ManageRoleController@listMenu');
    Route::any('/listMenuId', 'ManageRoleController@listMenuId');
    Route::get('/listMenuAll', 'ManageRoleController@listMenuAll');

    Route::get('/listUserEm', 'UserController@listUserEmployee');
    Route::get('/listUserCus', 'UserController@listUserCustomer');


    Route::group(['prefix' => 'secure'], function () {
        Route::get('/role', 'ManageRoleController@index');
        Route::get('/user','UserController@index');
    });
});
