@extends('layout/_layout')

@section('titulo', 'AspNetCore')


@section('conteudo')
    
<h3>Login</h3>

<h6><b>Classe Startup</b></h6>
<p>
    Configuração na classe Startup: <br>
    Dentro de ConfigureServices();
</p>
<div class="codigo">
<pre wrap="true">
<code>
//Controles de Sessão / Login
services.AddHttpContextAccessor(); //comando para receber pelo construtor a injeção de dependencia
services.AddScoped<.Sessao>(); //Possibilita a injeção da classe sessão em qualquer elemento.
services.AddScoped<.LoginCliente>();
//Fim controle Sessão / Login
</code>
</pre>
</div>

<h6><b>Libraries/Login</b></h6>
<b>Classe LoginCliente</b>
<p>
    Newtonsoft.Json foi baixado via nugget. É utilizado para a serialização e desserialização, ou seja,
    converte objetos em string e vice-versa. Nesse caso é utilizado para fazer a conversão do objeto Cliente
    e passar para a sessão, que é iniciada no construtor.
</p>

<div class="codigo">
<pre wrap="true">
<code>
using LojaVirtual.Models;
using Newtonsoft.Json;

namespace LojaVirtual.Libraries.Login
{
    public class LoginCliente
    {
        private string key = "Login.Cliente";
        private Sessao.Sessao _sessao;

        public LoginCliente(Sessao.Sessao sessao)
        {
            _sessao = sessao;
        }

        public void Login(Cliente cliente)
        {
            //Serialização do objeto
            string clienteJSONString = JsonConvert.SerializeObject(cliente);
            _sessao.Cadastrar(key, clienteJSONString);
        }

        public Cliente GetCliente()
        {
            //Desserialização do Objeto
            if (_sessao.Existe(key))
            {
                string clienteJSONString = _sessao.Consultar(key);
                return JsonConvert.DeserializeObject<.Cliente>(clienteJSONString);
            }
            else
            {
                return null;
            }
        }

        public void Logout()
        {
            _sessao.RemoverTodos();
        }
    }
}
</code>
</pre>

</div>


<h6><b>HomeController</b></h6>
<b>Recebimento de dados do formulário e encaminhamento</b>

<p>
    Dentro do HomeController é feito o recebimento e validação dos dados. Se usuário for encontrado, redireciona
    Senão, envia mensagem de erro para a view. <br>
    Também tem uma simulação de painel de controle, apenas para entendimento de como trabalhar com os dados que vem na sessão, 
    e a permissão de acesso. A principío está bem rustico, tenho certeza que mais adiante no curso vou aprender uma maneira 
    melhor de fazer navegação restrita.
</p>

<div class="codigo">
<pre wrap="true">
<code>
[HttpGet]
public IActionResult Login()
{
    return View();
}


[HttpPost]
public IActionResult Login([FromForm] Cliente cliente)
{

    Cliente clienteDB = _repositoryCliente.Login(cliente.Email, cliente.Senha);

    if(clienteDB != null)
    {
        _loginCliente.Login(clienteDB);
        return new RedirectResult(Url.Action(nameof(Painel)));
    }
    else
    {
        ViewData["MSG_E"] = "Usuário não encontrado, verifique o usuário e senha digitados";
        return View();
    }
}

//Simulacao de painel de controlller
[HttpGet]
public IActionResult Painel()
{
    //Acessando informações da sessão:
    //para pegar o valor ID, utiliza-se esse metodo.
    // Mas uma vez importado o namesapce Http, utiliza-se o GetSrting ou GetInt32


    //TryGetValue() Precisa de dois parametros.
    Cliente cliente = _loginCliente.GetCliente();
    if (cliente != null)
    {
        return new ContentResult() { Content = "Usuario " + cliente.id + ". Email: " + cliente.Email
            + ". Idade: " + DateTime.Now.AddYears(-cliente.Nascimento.Year).ToString("yy") + ". Logado!!!"};
    }
    else
    {
        return new ContentResult() { Content = "Acesso Negado!" };
    }

}
</code>
</pre>

</div>


@endsection