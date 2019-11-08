@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')

<h4>Os benefícios da paginação</h4>
<div>
    <div class="bordered">
        <b>Algoritmo</b>
        <p>
            var NumeroPagina = 1; <br>
            var RegistroPorPagina = 10; <br>
            var Skip = NumeroPagina * RegistroPorPagina - RegistroPorPagina; <br>
            var QuantidadeRegistros = _banco.Produtos.Count(); <br>
            var QuantidadePaginas = QuantidadeRegistros / RegistroPorPagina; <br>
        </p>
    </div>
    <p>
        <b>Paginação com Entity Framework:</b> <br>
        <u>Página 1:</u><br>
        _banco.Produtos.Skip(0).Take(10).ToList(); <br> <br>
        <u>Página 2:</u><br>
        _banco.Produtos.Skip(10).Take(10).ToList(); <br> <br>
        <u>Página 3:</u><br>
        _banco.Produtos.Skip(20).Take(10).ToList(); <br> <br>
    </p>
</div>

<div>
    <p>
        Foram utilizados dois comandos básicos: <br>
        Skip(): Pula registros, por exemplo, em uma lista de 50 registros, ele pula os 10 primeiros. <br>
        Take(): Limita a quantidade de registros que pega.
    </p>
</div>

<div class="borderedFull">
    <h5>Biblioteca para paginação:</h5>
    <b>X.PagedList</b> <br>
    <p><a href="http://github.com/dncuug/X.PagedList">GitHub</a></p>
</div>

<div>
    <p>
        A paginação deve ser feita no repositório, caso contrário, a paginação ocorre apenas para o cliente, ou seja, 
        a busca retornaria todos os registros do banco, ficando muito pesado dependendo da situação. Mas, se feita no repository, 
        cada novo request por mais dados busca especificamente aqueles dados direto no banco de dados.
    </p>

</div>


<br><br><b>InterfaceRepository</b> <br>

<div class="codigo">
<pre wrap="true">
<code>
/*
* Paginacao com a biblioteca X.PagedList
*/

IPagedList< Categoria > ObterTodasCategorias(int? pagina);
</code>
</pre>
</div>

<br><br><b>ClasseRepository</b><br>
<div class="codigo">
<pre wrap="true">
<code>
/*
* Para Paginacao: 
* Serão sempre 10 registros por página então declara-se uma constante:
*/

const int _registroPorPagina = 10;

public IPagedList< Categoria > ObterTodasCategorias(int? pagina)
{
    int NumeroPagina = pagina ?? 1;
    return _banco.Categorias.ToPagedList< Categoria >(NumeroPagina, _registroPorPagina);
}
</code>
</pre>
</div>

<br><br><b>ClasseController</b><br>
<div class="codigo">
<pre wrap="true">
<code>
public IActionResult Index(int? pagina)
{
    var categorias = _categoriaRepository.ObterTodasCategorias(pagina);
    return View(categorias);
}
</code>
</pre>
</div>

<br><br><b>View</b> <br>
<p>
    <strong>Não esquecer de adicionar o arquivo css no _Layout.</strong><br>
    <p>Pegar dentro da pa pasta exemplo no repositório do 
    <a href="https://raw.githubusercontent.com/dncuug/X.PagedList/master/examples/X.PagedList.Mvc.Example.Core/wwwroot/css/PagedList.css" target="_blank">
        GitHub
    </a></p>
</p>
<div class="codigo">
<pre wrap="true">
<code>
@@model X.PagedList.IPagedList< LojaVirtual.Models.Categoria >
@@using X.PagedList.Mvc.Core;
@@using X.PagedList;

@{
    ViewData["Title"] = "Index";
}

< h1 >Index< /h1 >

@@foreach (Categoria categoria in Model)
{
    @@categoria.Nome
    < br />
}
//Documentação da biblioteca
@@Html.PagedListPager((IPagedList)ViewBag.OnePageOfProducts, PageRemoteAttribute => Url.Action("Index", new { page }))

//Adaptação para a Classe
@@Html.PagedListPager((IPagedList)Model, pagina => Url.Action("Index", new { pagina }))
</code>
</pre>
</div>


@endsection