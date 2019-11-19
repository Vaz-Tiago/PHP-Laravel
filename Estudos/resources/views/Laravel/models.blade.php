@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')
	

<h4>Criando via artisan</h4>
<p>
	Para fazer a migrations, é necessário que o banco de dados já esteja criado (Caso estiver sendo utilizado Mysql). <br>
	Estou utilizando o Laravel 6. E o sistema compativel é: utf8mb4 - utf9mb4_genaral_ci
</p>

<ul class="collection with-header">
	<li class="collection-header"> <h5> php artisan make:model Models\\Balance -m </h5></li>
	<li class="collection-item"> Models\\ : É o namespace. Essa pasta não existe por padrão no Laravel. Mas é interessante criar para manter uma melhor organização </li>
	<li class="collection-item">
		\\ : É necessário, pois apenas uma contrabarra vira um caracter de escape. <br>
		<small>
			Reparei que no laravel 6 que estou utilizando. (Propositalmente diferente do curso para ver as diferenças)
			não foi necessário a utilização de \\ na hora da criação da Model, toda vez que utilizei o comando desta maneira
			o nome da classe model era iniciado com uma \
		</small>
	</li>
	<li class="collection-item"> - m : O parametro diz para o laravel também criar a migration. </li>
	<p>A migration sempre vai ser criada no plural. </p>
</ul>

@endsection