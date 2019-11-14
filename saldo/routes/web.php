<?php

//Grupo filtrado pelo middleware de autenticação
//namespace => Admin é para não ter que ficar esecificando a pasta que esta o controller, pois vai buscar todos nesta pasta
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@index']);
    
    Route::get('balance', ['as' => 'admin.balance', 'uses' => 'BalanceController@index']);
    
    Route::get('deposit', ['as' => 'balance.deposit', 'uses' => 'BalanceController@deposit']);
    Route::post('deposit', ['as' => 'deposit.store', 'uses' => 'BalanceController@depositStore']);

    Route::get('withdraw', ['as' => 'balance.withdraw', 'uses' => 'BalanceController@withdraw']);
    Route::post('withdraw', ['as' => 'withdraw.store', 'uses' => 'BalanceController@withdrawStore']);

    Route::get('transfer', ['as' => 'balance.transfer', 'uses' => 'BalanceController@transfer']);
    Route::post('confirm-transfer', ['as' => 'confirm.transfer', 'uses' => 'BalanceController@confirmTransfer']);
    Route::post('transfer', ['as' => 'transfer.store', 'uses' => 'BalanceController@transferStore']);

});



Route::get('/', ['as' => 'Site.Index', 'uses' => 'Site\SiteController@Index']);

Auth::routes();
