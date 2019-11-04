@extends('Layout/_layout')

@section('titulo', 'AspNetCore')
    
@section('conteudo')
    

<h3>Criação de Layout</h3>

<ul class="collection with-header">
    <li class="collection-header"> 
        <h5>Dentro de Views</h5>
    </li>
    <li class="collection-item">
        Pasta <b>Shared</b>. <br>
        Ela armazena todos os arquivos que serão compartilhados. 
    </li>
    <li class="collection-item">
        Criar: <b>NovoItem -> Web -> Layout do Razor</b> <br>
        Todo item compartilhado deve conter o prefixo ' _ ' (Underline);
    </li>
</ul>

<ul class="collection with-header">
    <li class="collection-header"> 
        <h5>Estrutura de um _Layout</h5>
    </li>
    <li class="collection-item">
        <b>@@RenderBody()</b> <br>
        Renderiza todo o corpo das views. O que não for RenderBody() vai se repetir.
    </li>
    <li class="collection-item">
        Para que o _Layout seja utilizado pelas view, deve ocorrer um chjamado:<br>
        @{
            Layout = "_Layout";
        } <br>
        Simples assim. Se estiver sendo seguido todos os padrões de nomenclatura, não precisa de mais nada, pois 
        o razor entende que deve fazer a busca na pasta shared.
    </li>
    <li class="collection-item">
        para o direcionamento de links dentro de um _Layout, sempre utilizar "/", pois assim é pego da raiz.
    </li>
</ul>


<ul class="collection with-header">
    <li class="collection-header"> 
        <h5>_ViewStart</h5>
    </li>
    <li class="collection-item">
        Deve estar na raíz da pasta view.
    </li>
    <li class="collection-item">
        <b>Add->New Item -> Web -> Razor View Start</b>
    </li>
    <li class="collection-item">
        Recurso que automatiza o processo de declaração de _Layout. Dessa forma, não é necessário adicionar
        o nome da view em todoas as views que venham a ser criadas.
    </li>
</ul>
    

@endsection