<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Layout/_layout');
});

Route::get('/laravel/models', ['as' => 'laravel.models', 'uses' => 'LaravelController@ModelsMigrations']);


Route::get('/aspnetcore/mvc', ['as' => 'AspNetCore.Mvc', 'uses' => 'AspNetCoreController@Mvc'] );
Route::get('/aspnetcore/login', ['as' => 'AspNetCore.Login', 'uses' => 'AspNetCoreController@Login'] );
Route::get('/aspnetcore/session', ['as' => 'AspNetCore.Session', 'uses' => 'AspNetCoreController@Session'] );
Route::get('/aspnetcore/layout', ['as' => 'AspNetCore.Layout', 'uses' => 'AspNetCoreController@Layout'] );