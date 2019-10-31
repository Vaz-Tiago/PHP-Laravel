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

//Rota Inicial
Route::get('/',['as'=> 'site.home', 'uses'=>'Site\HomeController@index']);


//Rota Login
Route::get('/login',
    ['as'=> 'site.login', 'uses'=>'Site\LoginController@index']);

Route::post('/login/entrar',
    ['as'=> 'site.login.entrar', 'uses'=>'Site\LoginController@entrar']);

Route::get('/login/sair', 
    ['as' => 'site.login.sair', 'uses'=>'Site\LoginController@sair']);




//Rotas controladas / restritas    
Route::group(['middleware' => 'auth'], function ()
{
    //Rotas do Crud
    //primeira opção do segundo parametro é o apelido da rota
    Route::get('/admin/cursos', 
        ['as'=>'admin.cursos', 'uses'=>'Admin\CursoController@index']);
    Route::get('/admin/cursos/adicionar', 
        ['as'=>'admin.cursos.adicionar', 'uses'=>'Admin\CursoController@adicionar']);
    Route::post('/admin/cursos/salvar', 
        ['as'=>'admin.cursos.salvar', 'uses'=>'Admin\CursoController@salvar']);
    Route::get('/admin/cursos/editar/{id}', 
        ['as'=>'admin.cursos.editar', 'uses'=>'Admin\CursoController@editar']);
    Route::put('/admin/cursos/atualizar/{id}', 
        ['as'=>'admin.cursos.atualizar', 'uses'=>'Admin\CursoController@atualizar']);
    Route::get('/admin/cursos/deletar/{id}', 
        ['as'=>'admin.cursos.deletar', 'uses'=>'Admin\CursoController@deletar']);

});


Route::get('/contato/{id?}', ['uses' => 'ContatoController@index']);
Route::post('/contato', ['uses' => 'ContatoController@criar']);
Route::put('/contato', ['uses' => 'ContatoController@editar']);