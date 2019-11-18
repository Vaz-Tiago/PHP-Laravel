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

Route::group(['namespace' => 'Form'], function()
{
    //Rota para chamar os verbos:
    //
    //Route::verbo('uri', 'Controller@metodo')->('route_name');

    //Toda verbalização sempre será feita em letras minusculas. SEMPRE

    //VERBO GET

    //sempre comentar a linha que chama um controlador que ainda nao existe.
    //pois o artisan faz uma checagem em todos os arquivos e pode retornar um erro
    Route::get('usuarios', 'TestController@listAllUsers')->name('users.listAll');


    //Rotas são lidas de cima para baixo. 
    //Como foi fixado um parametro dinamico em {user} que só recebe inteiros, 
    //Deve-se colocar as rotas fixas para cima, assim elas serão lidas primeiro e nao
    //tem nenhuma restrição ou variação do tipo de dados que vai entrar
    //R1. Chama Formulario
    Route::get('usuarios/novo', 'TestController@formAddUser')->name('users.formAddUser');
    Route::get('usuarios/editar/{user}', 'TestController@formEditUser')->name('users.formEditUser');


    //A primeira parte do get ue informa a rota, o que for passado depois da barra dentro de {}
    //é entendendido como parametro como um get realemnte mas sem o ?nome= 
    Route::get('usuarios/{user}', 'TestController@listUser')->name('users.listUser');


    //VERBO POST
    //uma rota usuarios/cadastro seria muito obvia. O Laravel tem palavras reservadas
    //para este tipo de ação, neste caso é store.
    //necessita de duas rotas: 
    //R1. Chama o formulário 
    //R2.interage com a camada modelo
    Route::post('usuarios/store', 'TestController@storeUser')->name('users.store');


    //VERBO PUT/PATCH
    //Responsável pela atualizacao de cadastro
    //Também é necessário duas rotas:
    //E1. Exibe o Formulárop
    //E2. Executa a ação
    Route::put('usuarios/edit/{user}', 'TestController@edit')->name('users.edit');


    //VERBO DELETE
    //Deleta o cadastro
    //Rota antes de entrar no group:
    //Route::delete('usuarios/destroy/{user}', 'Form\\testController@destroy')->name('users.destroy');

    Route::delete('usuarios/destroy/{user}', 'TestController@destroy')->name('users.destroy');
});




//COMANDO PARA LISTAR TODAS AS ROTAS DO SISTEMA:

//php artisan route:list
