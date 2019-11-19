@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')

<h5><b>Nomeado Rotas</b></h5>
<p>
    Nomear rotas é uma prática importante para a manutenção da aplicação, pois uma vez que haja a necessidade 
    de  alteração ela será feita em um só lugar e atualizada em toda aplicação. <br>
    Por isso toda action de formulário, link ou redirecionamento de página deve ser feito pelo blade, 
    chamando o nome da rota. <br>
    Aplicação do nome da rota no Laravel: 
</p>
<div class="codigo">
<code>
<pre wrap="true">
Route::get('laravel/rotas',
[
    'as'    => 'Laravel.Rotas',
    'uses'  => 'LaravelController@Rotas'
]);
</pre>
</code>
</div>
<blockquote>
    <b>Route::verbo('url', controller@metodo)->name('nomeRota');</b><br>
    <small>Outro meio de nomear rotas</small>
</blockquote>
<p>
    A estrutura utilizada aqui é simples: <br>
    <ul class="browser-default">
        <li>
            <b>Route::get(' laravel/rotas ', ) </b> - Define o tipo de requisição e o primeiro paramêtro do 
            método que é o endereço da rota, por endereço eu me refiro ao que deve ser digitado no navegador 
            para acessar a rota, por exemplo: <br>
            www.site.com.br/<b>laravel/rotas</b>
        </li>
        <li>
            <b>
                [ <br>
                <div class="ident1">
                    'as' => 'Laravel.Rotas', <br>
                    'uses' => 'LaravelController@Rotas' <br>
                </div>
                ]);
            </b> <br>
            Este é o segundo paramêtro, uma array com o nome da rota e a ação que ela toma. <br>
            'as' => 'NomeDaRota', <br>
            'uses' => 'Controller@Método';
        </li>
    </ul>
</p>

<blockquote>
    <b>{ { route('Laravel.Rotas') } }</b> <br>
    <small>Chamada da rota pelo nome</small>
</blockquote>

<h5><b>Agrupamento de Rotas</b></h5>

<b>Namespace</b>
<p>
    O agrupamento de rotas é muito interessante para, principalmente, organização e definição de controle de acesso. <br>
    Por exemplo, o aplicativo tem duas áreas, usuário e admin, é possível agrupar as rotas destas áreas: 
</p>
<div class="codigo">
<code>
<pre wrap="true">
Route::group(['namespace' => 'Admin'], function()
{
    //Todas as rotas que se referem ao namespace Admin;
    Route::get('admin/dashboard',
    [
        'as'    => 'admin.dashboard',
        'uses'  => 'dashboardController@index'
    ]);

    Route::get('admin/novo-usuario',
    [
        'as'    => 'admin.novoUsuario',
        'uses'  => 'usuarioController@novoUsuario'
    ]);
});
</pre>
</code>
</div>
<p>
    Todas essas rotas vão apontar para controladores que estão dentro da pasta Controllers/Admin.
</p>

<b>Prefixo</b>
<p>
    O prefixo é outra funcionalidade do agrupamento de rotas. Ao ser definido um prefixo 'admin', não é mais 
    necessário digitar o <b>/admin/dashboard</b>, pois o laravel já vai entender que o prefixo das rotas do grupo 
    são <b>/admin/</b> e vai setar isso automaticamente. <br>
</p>

<div class="codigo">
<code>
<pre wrap="true">
Route::group(['prefix' => 'admin'], function()
{
    //Todas as rotas que utilizam o /admin como url;
    Route::get('dashboard',
    [
        'as'    => 'admin.dashboard',
        'uses'  => 'dashboardController@index'
    ]);

    Route::get('novo-usuario',
    [
        'as'    => 'admin.novoUsuario',
        'uses'  => 'usuarioController@novoUsuario'
    ]);
});
</pre>
</code>
</div>

@endsection