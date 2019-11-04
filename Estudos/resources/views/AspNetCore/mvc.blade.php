@extends('Layout/_layout')

@section('titulo', 'AspNetCore')


@section('conteudo')


<h3>Models</h3>

<ul class="collection with-header">
    <li class="collection-header"> 
        <h5> Classes que recebem Dados</h5>
    </li>
    <li class="collection-item">
        Se comunica com o Banco de Dados ou formulários.
    </li>
    <li class="collection-item">
        Cada Model representa uma tabela no banco de dados
    </li>
    <li class="collection-item">
        Cria Regras por meio de DataAnotations
    </li>
</ul>



<h3>Views</h3>

<ul class="collection with-header">
    <li class="collection-header"> 
        <h5>Regras para Criação de Views </h5>
    </li>
    <li class="collection-item">
        Dentro da pasta View, deve haver uma pasta para cada controller, essa pasta deve ter o nome do controller.
    </li>
    <li class="collection-item">
        As Views devem ter nome do método que a invoca, ou seja, cada view representa (Apresenta) um método.
    </li>
    <li class="collection-item">
        A view é um arquivo de exbição do razor e possí a extensao .cshtml
    </li>
    <li class="collection-item">
        View Razor pode executar código Razor, facilitando muito a comunicação back / front. <br>
        Chame o razor com @. <br>
        Para codificar várias linhas: <br>
        @ {
            Todo o código aqui;
        }
    </li>
</ul>



<h3>Controllers</h3>

<ul class="collection with-header">
	<li class="collection-header"> 
        <h5> Regras para criar um Controller:</h5>
    </li>
	<li class="collection-item">
        Deve ser Criado dentro da pasta Controller;
    </li>
	<li class="collection-item">
		Deve conter o sufixo Controller
		<small>
            Ex: ProdutosController
		</small>
	</li>
    <li class="collection-item">
        Todo Controller herda da classe Controller, que está no namespace: <br>
        Microsoft.AspNetCore.Mvc
    </li>
    <li class="collection-item">
        Todo método deve retornar um ActionResult ou IActionResult
    </li>
    <li class="collection-item">
        Para que o Visual Studio crie a view de um método, basta segurar o ctrol e clicar com o botao 
        direito no nome do método e selecionar a opção Adicionar View;
        Se a pasta com o nome do método não existir, a IDE cria.
    </li>
</ul>



@endsection