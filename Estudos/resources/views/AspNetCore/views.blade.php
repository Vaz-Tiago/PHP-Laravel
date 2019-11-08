@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')

<h3>Views</h3>

<b>Converter Id em nome da categoria</b><br>
<h4>ClasseRepository</h4>
<br><br><p>A alteração aqui nessa classe é feita apenas no .Include(a=>a.CategoriaPai)</p><br>
<div class="codigo">
<pre wrap="true">
<code>
public IPagedList< Categoria > ObterTodasCategorias(int? pagina)
{
    int NumeroPagina = pagina ?? 1;
    return _banco.Categorias.Include(a=>a.CategoriaPai).ToPagedList< Categoria >(NumeroPagina, _registroPorPagina);
}
</code>
</pre>
</div>



<h4>ViewDaListagem</h4>
<p>Alternativa 1.</p>
<div class="codigo">
<pre wrap="true">
<code>
@@if (categoria.CategoriaPai != null)
{
    < span>
        @@categoria.CategoriaPai.Id - @@categoria.CategoriaPai.Nome
    < /span>
}
else
{
    < span> -- < /span>
}
</code>
</pre>
</div>

<br><br><p>Alternativa 2.</p><br>
<div class="codigo">
<pre wrap="true">
<code>
@@Html.DisplayFor(model=> categoria.CategoriaPai.Nome)
</code>
</pre>
</div>



@endsection