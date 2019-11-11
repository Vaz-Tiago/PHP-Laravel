@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')
	
<p>
    Biblioteca de painel de administrador com sistema de login integrado. <br>
    Não só faz o login e mantem a necessidade de estar autenticado para acessar, como também 
    insere um novo registro de usuáro no banco de dados. <br>
</p>

<a href="http://https://github.com/jeroennoten/Laravel-AdminLTE">GitHub</a> <br>

<ul class="browser-default">
    Basta seguir a documentação pára fazer a instalação e configuração, mas vou resumir um pouquinho:
    <li>
        <b>Composer: </b>composer require jeroennoten/laravel-adminlte
    </li>
    <li>
        <b>Instalação completa: </b>php artisan adminlte:install --type=full
    </li>
    
</ul>

@endsection