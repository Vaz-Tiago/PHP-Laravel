<?php

//Grupo filtrado pelo middleware de autenticação
//namespace => Admin é para não ter que ficar esecificando a pasta que esta o controller, pois vai buscar todos nesta pasta
Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function () {
    Route::get('admin', ['as' => 'Admin.Home', 'uses' => 'AdminController@Index']);
});



Route::get('/', ['as' => 'Site.Index', 'uses' => 'Site\SiteController@Index']);

Auth::routes();
