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
    return view('welcome');
});

//Passa o controller por uma array: key uses=> NomedoController@NomeDoMetodo
Route::get('/contato/{id?}', ['uses' => 'ContatoController@index']);


//Modo Sem Controller
//Route::post('/contato', function () {
//    dd($_POST);
//    return "Contato POST";
//});

Route::post('/contato', ['uses' => 'ContatoController@criar']);

Route::put('/contato', ['uses' => 'ContatoController@editar']);
