@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')
	

<h3>Models & Migrations</h3>

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

<p>
	<b>Importante: </b> Sempre que deletar uma migration, seja qual for o motivo, é necessário rodar o comando: <br>
	composer dump-autoload <br>
	Porque? Não sei, depois eu pesquiso sobre isso.
</p>

<h4>Propriedades das tabelas</h4>

<p>Todas alterações nas estruturas das tabelas são feitas dentro das migrations.</p>
<p>
	
</p>

<p></p>
<p>
	<ul class="collection with-header">
		<li class="collection-header">
			<h5>Criando colunas:</h5>
		</li>
		<li class="collection-item">
			$table->BigIncrements('id');<br>
			<small>
				|| Cria a PK, já vem preenchido por padrão || <br>
				|| Notei que no L6 é bigIncrements ||
			</small>
		</li>
		<li class="collection-item">
			$table->unsignedBigInteger('user_id'); <br>
			<small>
				|| Unsigned porque esse campo vai ser chave estrangeria - Unsigned dessa forma é para versao 5.5||<br>
				|| Versão 5.5 do laravel é diferente: $table->integer('user_id')->unsigned(); ||
			</small>
		</li>
		<li class="collection-item">
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); <br>
			<small>
				|| Define a FK, que faz REFERENCES ao campo id ON  tabela users e ONDELETE o usuario, 
				vai deletar este registro que faz referencia a ele nesta tabela também ||
			</small>
		</li>
		<li class="collection-item">
			$table->double('amount', 10, 2); <br>
			<small>
				|| double para valor ponto flutuante, com dez casas antes da virgula e dois depois ||
			</small>
		</li>
		<li class="collection-item">
			$table->timestamps(); <br>
			<small>
				|| Valor padrao da migratons criada pelo laravel. Adiciona automaticamente a hora da ultima
				modificação feita na linha da tabela. || <br>
				|| Caso não trabalhe com timestamps (Salva a hora de toda alteração dentro da tabela), 
				é necessário crir um att publico na model daquela tabela e setar como $timestamps = false ||
			</small>
		</li>
	</ul>
</p>

<h5><b>Configurações</b></h5>
<p>
	O modelo utf8mb4, para campos que são primary key e unique, impoe um limite de 191 caracteres, 
	para não oter que colocar esse limite em todos os campos pk e unique, é só fazer uma alteração. <br>
	Isso define o valor padrao de todos os campos string da tabela.
</p>
<br>
<div class="codigo">
<pre wrap="true">
<code>

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Adicionado para alterar o padrao da tabela
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
	/**
		* Register any application services.
		*
		* @@return void
		*/
	public function register()
	{
		//
	}

	/**
		* Bootstrap any application services.
		*
		* @@return void
		*/
	public function boot()
	{
		//Isso faz com que o campo default colunas que tem tamanho defindo é 191 e não 255;
		Sechema::defaultStringLength(191);
	}
}

</code>
</pre>
</div>

@endsection