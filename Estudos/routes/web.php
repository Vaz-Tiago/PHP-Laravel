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
    $info = ['secao' => 'padrao', 'titulo' => 'Estante de Estudos', 'submenu' => ''];
    return view('Layout/_layout', compact('info'));
});


//Laravel
Route::group(['prefix' => 'laravel'], function(){

    Route::get('adminlte', 
    [
        'as'    => 'Laravel.AdminLTE', 
        'uses'  => 'LaravelController@AdminLTE'
    ]);

    Route::get('assets', 
    [
        'as'    => 'Laravel.Assets', 
        'uses'  => 'LaravelController@Assets'
    ]);

    Route::get('filtros', 
    [
        'as'    => 'Laravel.Filtros', 
        'uses'  => 'LaravelController@Filtros'
    ]);

    Route::get('login', 
    [
        'as'    => 'Laravel.Login', 
        'uses'  => 'LaravelController@Login'
    ]);

    Route::get('migrations', 
    [
        'as'    => 'Laravel.Migrations', 
        'uses'  => 'LaravelController@Migrations'
    ]);

    Route::get('models',
    [
        'as'    => 'Laravel.Models',
        'uses'  => 'LaravelController@Models'
    ]);

    Route::get('paginacao',
    [
        'as'    => 'Laravel.Paginacao',
        'uses'  => 'LaravelController@Paginacao'
    ]);

    Route::get('rotas',
    [
        'as'    => 'Laravel.Rotas',
        'uses'  => 'LaravelController@Rotas'
    ]);

    Route::get('seeders', 
    [
        'as'    => 'Laravel.Seeders',
        'uses'  => 'LaravelController@Seeders'
    ]);

    Route::get('validacaoFormulario', 
    [
        'as'    => 'Laravel.ValidacaoFormulario',
        'uses'  => 'LaravelController@ValidacaoFormulario'
    ]);

    Route::get('verbos', 
    [
        'as'    => 'Laravel.Verbos',
        'uses'  => 'LaravelController@Verbos'
    ]);
});



//AspNetCore
Route::group(['prefix' => 'aspnetcore'], function (){
    Route::get('area', 
    [
        'as'    => 'AspNetCore.Area', 
        'uses'  => 'AspNetCoreController@Area'
    ]);
    
    Route::get('controllers', 
    [
        'as'    => 'AspNetCore.Controllers',
        'uses'  => 'AspNetCoreController@Controllers'
    ]);

    Route::get('crud', 
    [
        'as'    => 'AspNetCore.Crud',
        'uses'  => 'AspNetCoreController@Crud'
    ]);

    Route::get('email', 
    [
        'as' => 'AspNetCore.Email', 
        'uses' => 'AspNetCoreController@Email'
    ]);

    Route::get('filters', 
    [
        'as'    => 'AspNetCore.Filters',
        'uses'  => 'AspNetCoreController@Filters'
    ]);

    Route::get('inecaodependencias', 
    [
        'as'    => 'AspNetCore.InjecaoDependencias',
        'uses'  => 'AspNetCoreController@InjecaoDependencias'
    ]);

    Route::get('/aspnetcore/layout', 
    [
        'as'    => 'AspNetCore.Layout',
        'uses'  => 'AspNetCoreController@Layout'
    ]);
    
    Route::get('/aspnetcore/login', 
    [
        'as'    => 'AspNetCore.Login',
        'uses'  => 'AspNetCoreController@Login'
    ]);

    Route::get('/aspnetcore/mid', 
    [
        'as'    => 'AspNetCore.Mid',
        'uses'  => 'AspNetCoreController@Mid'
    ]);

    Route::get('/aspnetcore/models', 
    [
        'as'    => 'AspNetCore.Models',
        'uses'  => 'AspNetCoreController@Models'
    ]);

    Route::get('/aspnetcore/mvc', 
    [
        'as'    => 'AspNetCore.Mvc',
        'uses'  => 'AspNetCoreController@Mvc'
    ]);

    Route::get('/aspnetcore/paginacao', 
    [
        'as'    => 'AspNetCore.Paginacao',
        'uses'  => 'AspNetCoreController@Paginacao'
    ]);

    Route::get('/aspnetcore/razor', 
    [
        'as'    => 'AspNetCore.Razor',
        'uses'  => 'AspNetCoreController@Razor'
    ]);

    Route::get('/aspnetcore/repository', 
    [
        'as'    => 'AspNetCore.Repository',
        'uses'  => 'AspNetCoreController@Repository'
    ]);

    Route::get('/aspnetcore/resourcefile', 
    [
        'as'    => 'AspNetCore.ResourceFile',
        'uses'  => 'AspNetCoreController@ResourceFile'
    ]);

    Route::get('/aspnetcore/rotas', 
    [
        'as'    => 'AspNetCore.Rotas',
        'uses'  => 'AspNetCoreController@Rotas'
    ]);

    Route::get('/aspnetcore/session', 
    [
        'as'    => 'AspNetCore.Session',
        'uses'  => 'AspNetCoreController@Session'
    ]);

    Route::get('/aspnetcore/uwork', 
    [
        'as'    => 'AspNetCore.UWork',
        'uses'  => 'AspNetCoreController@UWork'
    ]);

    Route::get('/aspnetcore/views', 
    [
        'as'    => 'AspNetCore.Views',
        'uses'  => 'AspNetCoreController@Views'
    ]);
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
