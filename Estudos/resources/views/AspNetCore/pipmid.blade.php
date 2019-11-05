@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')


<h3>Pipelines, Middlewares e Filtros</h3>

<h6><b>Pipeline:</b></h6>
<b> Definição:</b> <br>
<p>
    É um conjunto de processos encadeados através de seus fluxos padrão, de forma que a saída de um processo é utilizada como 
    entrada do processo seguinte. <br>
    Uma sequência de passos que deve ser executados para realizar uma tarefa, um fluxo de processamento. <br>
</p>

<h6><b>Middleware</b></h6>
<b>Definição:</b>
<p>
    É um software montado em um pipeline de aplicativo para manipular solicitações e respostas. <br>
    Cada Componente: <br>
    1. Escolhe se deseja passar a solicitação para o próximo componente no pipeline. (curto-circuito); <br>
    <img class="materialboxed" src="/img/middleware.png" alt="Conceito de Middleware">
    <p class="ident1">
        Quando há a quebra e a requisição volta antes de passar por todos os Middlewares, ocorre o curto circuito. <br>
        Significa que o middleware não passou a solitação para o próximo. Não necessáriamente significa que a aplicação 
        vai quebrar.
    </p>
    2. Pode executar o trabalho antes e depois do próximo componente no pipeline. <br>
    <p class="ident1">
        Significa que, utilizando como exemplo a imagem acima, o middleware 1 vai ser o primeiro e útimo a ser chamado. <br>
        isso é a lógica de requisição e de resposta. Não necessáriamente o middleware precisa ser de requisicao e resposta, ele 
        pode ser apenas de requisição ou apenas de resposta. <br>
        Todo App.Use na classe Startup, são middlewares. <br>
        <br>
        Ainda na Startup, um middleware chamado na linha 15, não será aplicado aos que estão sendo chamados da linha 
        1 a 14, porque ele não existe até a linha 15. Dali adiante ele vai ser aplicado a tudo que for chamado.
    </p>
</p>

<h6><b>Middleware</b></h6>

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