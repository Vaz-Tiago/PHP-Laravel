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

//Laravel
Route::get('/laravel/models', ['as' => 'laravel.models', 'uses' => 'LaravelController@ModelsMigrations']);


//AspNetCore
Route::get('/aspnetcore/controllers', ['as' => 'AspNetCore.Controllers', 'uses' => 'AspNetCoreController@Controllers'] );
Route::get('/aspnetcore/crud', ['as' => 'AspNetCore.Crud', 'uses' => 'AspNetCoreController@Crud'] );
Route::get('/aspnetcore/email', ['as' => 'AspNetCore.Email', 'uses' => 'AspNetCoreController@Email'] );
Route::get('/aspnetcore/inecaodependencias', ['as' => 'AspNetCore.InjecaoDependencias', 'uses' => 'AspNetCoreController@InjecaoDependencias'] );
Route::get('/aspnetcore/layout', ['as' => 'AspNetCore.Layout', 'uses' => 'AspNetCoreController@Layout'] );
Route::get('/aspnetcore/login', ['as' => 'AspNetCore.Login', 'uses' => 'AspNetCoreController@Login'] );
Route::get('/aspnetcore/models', ['as' => 'AspNetCore.Models', 'uses' => 'AspNetCoreController@Models'] );
Route::get('/aspnetcore/mvc', ['as' => 'AspNetCore.Mvc', 'uses' => 'AspNetCoreController@Mvc'] );
Route::get('/aspnetcore/razor', ['as' => 'AspNetCore.Razor', 'uses' => 'AspNetCoreController@Razor'] );
Route::get('/aspnetcore/repository', ['as' => 'AspNetCore.Repository', 'uses' => 'AspNetCoreController@Repository'] );
Route::get('/aspnetcore/resourcefile', ['as' => 'AspNetCore.ResourceFile', 'uses' => 'AspNetCoreController@ResourceFile'] );
Route::get('/aspnetcore/rotas', ['as' => 'AspNetCore.Rotas', 'uses' => 'AspNetCoreController@Rotas']);
Route::get('/aspnetcore/session', ['as' => 'AspNetCore.Session', 'uses' => 'AspNetCoreController@Session'] );
Route::get('/aspnetcore/uwork', ['as' => 'AspNetCore.UWork', 'uses' => 'AspNetCoreController@UWork'] );
Route::get('/aspnetcore/views', ['as' => 'AspNetCore.Views', 'uses' => 'AspNetCoreController@Views'] );