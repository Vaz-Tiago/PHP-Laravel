@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')

<h3>Filtros</h3>

<p>
    A requisição passa primeiro por todos os middlewares para só depois passar pelos filtros. <br>
    O filtro é o último elemento a ser executado antes de chegar ao controlador. <br>
    <strong>Pipeline do Filtro</strong> é chamada assim porque existem várias possibilidades ao utilizar 
    filtros, pois existem vários tipos de filtro, com hierarquias que ditam o seu pipeline. <br>
    Filtros podem barrar acesso ou acrescentar recursos.
</p>


<b>Tabelas de tipos em sequência de prioridade</b>

<table class="striped">
    <thead>
        <tr>
            <th>Filtro</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Autorização
            </td>
            <td>
                Verifica se o usuário atual tem autorização para a solicitação
            </td>
        </tr>
        <tr>
            <td>
                Recurso
            </td>
            <td>
                Pode lidar com a requisição antes dos demais filtros ou depois deles serem executados. <br>
                Útil para fazer o cache e monitorar desempenho. <br>
                Chamado na Requisição e na Resposta.
            </td>
        </tr>
        <tr>
            <td>
                Ação
            </td>
            <td>
                pode executar o código antes ou depois de uma ação ser chamada.
            </td>
        </tr>
        <tr>
            <td>
                Exceção
            </td>
            <td>
                Cria políticas globais de exceção antes do corpo da resposta ser gravado.
            </td>
        </tr>
        <tr>
            <td>
                Resposta
            </td>
            <td>
                Pode executar código antes e/ou depois do resultado de uma ação. Este filtro só é executado 
                quando a ação teve exito. Útil para a exibição ou formatação do resultado.
            </td>
        </tr>
    </tbody>
</table>

<b>Exemplo de ActionFilter</b>
<p>Herda de IActionFilter.</p>


<div class="codigo">
<pre wrap="true">
<code>
public class CustonActionFilter : IActionFilter
{
    public void OnActionExecuting(ActionExecutiongContext context)
    {
        //Código antes de executar a action
        //Ida
    }
    public void OnActionExecuted(ActionExecutedContext context)
    {
        //Código depois de executar a action
        //Volta
    }
}
</code>
</pre>
</div>



@endsection