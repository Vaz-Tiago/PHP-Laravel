<?php

//Grupo filtrado pelo middleware de autenticação
//namespace => Admin é para não ter que ficar esecificando a pasta que esta o controller, pois vai buscar todos nesta pasta
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@index']);
    Route::get('balance', ['as' => 'admin.balance.index', 'uses' => 'BalanceController@index']);
    Route::get('deposit', ['as' => 'balance.deposit', 'uses' => 'BalanceController@deposit']);
    Route::post('deposit', ['as' => 'deposit.store', 'uses' => 'BalanceController@depositStore']);
});



Route::get('/', ['as' => 'Site.Index', 'uses' => 'Site\SiteController@Index']);

Auth::routes();
