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

<b>Namespace: Microsoft.AspNetCore.Mvc.Filters</b>

<b>Tabelas de tipos em sequência de prioridade</b>

<table class="striped">
    <thead>
        <tr>
            <th>Filtro</th>
            <th>Herança</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Autorização
            </td>
            <td>IAuthorizationFilter</td>
            <td>
                Verifica se o usuário atual tem autorização para a solicitação
            </td>
        </tr>
        <tr>
            <td>
                Recurso
            </td>
            <td>IResourceFilter</td>
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
            <td>IActionFilter</td>
            <td>
                pode executar o código antes ou depois de uma ação ser chamada.
            </td>
        </tr>
        <tr>
            <td>
                Exceção
            </td>
            <td>IExceptionFilter</td>
            <td>
                Cria políticas globais de exceção antes do corpo da resposta ser gravado.
            </td>
        </tr>
        <tr>
            <td>
                Resposta
            </td>
            <td>IResultFilter</td>
            <td>
                Pode executar código antes e/ou depois do resultado de uma ação. Este filtro só é executado 
                quando a ação teve exito. Útil para a exibição ou formatação do resultado.
            </td>
        </tr>
    </tbody>
</table>

<h6><b>Libraries/Filtro/ClienteAutorizacaoAttribute</b></h6>

<p>
    O filtro é passado dentro do Controllador, acima do método que encaminha para  a área restrita. <br>
    Como ele é o primeiro a executar no pipeline, se a condição for true ele continua o se caminho, chega até
    o controlador, caso contrário realiza sua ação de negação. <br>

    A injeção de dependência nesse caso é feita de maneira diferente, pois o filtro é utilizado como atributo. <br>
    Deve ser chamado o serviço para aplicar a injeção, pois na hora de utilizar o atributo no controller, não é necessário ficar implementando suas dependencias
</p>

<div class="codigo">
<pre wrap="true">
<code>

namespace LojaVirtual.Libraries.Filtro
{
    public class ClienteAutorizacaoAttribute : Attribute, IAuthorizationFilter
    {
        LoginCliente _loginCliente;

        //Implementação da interface de autorização.
        public void OnAuthorization(AuthorizationFilterContext context)
        {
            _loginCliente = (LoginCliente)context.HttpContext.RequestServices.GetService(typeof(LoginCliente));
            Cliente cliente = _loginCliente.GetCliente();
            if (cliente == null)
            {
                context.Result = new ContentResult() { Content = "Acesso Negado" };
            }
        }
    }
}
</code>
</pre>
</div>



@endsection