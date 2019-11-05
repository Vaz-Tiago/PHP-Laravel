@extends('Layout/_layout')

@section('titulo', 'AspNetCore')
    
@section('conteudo')

<h3>Session</h3>

<p>
    Cookie lado do Cliente / Sessão lado do servidor. <br>
    Normalmente guardado em memória ram. Mas pode ser configurável. <br>

</p>

<ul class="collection with-header">
    <li class="collection-header"> 
        <h5>Session:</h5>
    </li>
    <li class="collection-item">
        O navegador só armazena cookie. Por isso é criado uma session ID. Esse ID é passado para o cookie
        que usa como parametro para os seus requests.
    </li>
    <li class="collection-item">
        Removida quando navegador é fechado.
    </li>
    <li class="collection-item">
        Acessa as informações guardadas na sessão em qualquer lugar da aplicação
    </li>
    <li class="collection-item">
        Para acessar a sessão: <br>
        <b>Http.Context.Session.option</b>
    </li>
</ul>

<h3>Configurando Sessão</h3>

<b>Arquivo Startup.cs</b><br>
<p>
    Classe: ConfigureServices();<br>
    Adicionar o comando antes do MVC. <br>
    <small>
        Na versão 3.0 do Core, o serviço adicionado por padrão não é o MVC, então coloquei antes do que achei
        ser o equivalente, que é o ControllerWithViews();
    </small> <br>
<div class="codigo">
<pre wrap="true">
<code>
services.AddMemoryCache() // Guarda na memória; 
services.AddDistributedMemoryCache() 
// Utilizado para projetos de grande porte, onde a escalabilidade é horizontal. 
//O tráfego de dados é distribudo em vários servidores;

Services.AddSession(option =>
{
    //Dentro de options podemos fazer toda a configuração da sessão.
    options.IdleTimeOut
        //Tempo que o usuário pode ficar inativo e o sistema mantem
        //a sessão. Inativo, neste caso, é o período sem entrar no site. O valor padrão é 20 minutos.
        //Importante ressaltar que isto tem impacto direto no desempenho. Pois muitas sessões inativas, 
        //tem um impacto direto nas sessões que estão ativas.

    options.IoTimeout ()
    //Tempo de espera de inatividade do navegador.
    //Aqui é o tempo que o usuário esta na página inativo.
}
</code>
</pre>
</div>
</p>

<b>Classe: Configure(); </b><br>
<p>
    App.UseSession(); <br>
    <small>Também antes do MVC.</small> <br>
</p>


<h4>Escalabilidade</h4>

<h5>É o poder de processamento do servidor.</h5>

<b>Escalabilidade Vertical:</b><br>
<p>
    Aumenta o poder de processamento da mesma máquina via upgrades. É limitado ao que a placa desta máquina suporta
</p>

<b>Escalabilidade horizontal</b> <br>
<p>
    Aumenta o poder de processamento colocando várias máquinas para trabalhar juntas. <br>
    O App deve ser instalado em todas as máquinas. <br>
    O banco de dados fica instalado em um server dedicado que todos acessam. <br>
    O balanceamento de carga (pode ser feito via software) é o que encaminha os usuários para os servers. <br>
    Não há limite para expansão de processamento.
</p>
<p>
    O problema da escalabilidade hosrizontal e as Sessions, é que cada server armazena o seu cookie em sua ram,
    quando esse server cair e o usuário for redirecionado para um server ativo, ele vai perder suas informações de sessão. <br>
    Esse problema é resolvido com o AddDistributedMemoryCache(); Que vai armazenar o cache onde vc direcionar.
</p>

<br><br>

<h5><b>Libraries/Sessao</b></h5>

<p>
    Classe Utilizada para guardar as informações do usuário quando efetuar login.
</p>

<div class="codigo">
<pre wrap="true">
<code>
using Microsoft.AspNetCore.Http;

namespace LojaVirtual.Libraries.Sessao
{
    public class Sessao
    {
        private IHttpContextAccessor _context;
        public Sessao(IHttpContextAccessor context)
        {
            _context = context;
        }

        //CRUD - Cadastrar / Atualizar / consultar / Remover - Remover Todos / Verificar se existe

        public void Cadastrar(string key, string valor)
        {
            _context.HttpContext.Session.SetString(key, valor);
        }

        public void Atualizar(string key, string valor)
        {
            if(Existe(key))
            {
                Remover(key);
            }
            Cadastrar(key, valor);
        }

        public void Remover(string key)
        {
            _context.HttpContext.Session.Remove(key);
        }

        public string Consultar(string key)
        {
            return _context.HttpContext.Session.GetString(key);
        }

        public bool Existe(string key)
        {
            if(_context.HttpContext.Session.GetString(key) == null)
            {
                return false;
            }

            return true;
        }

        public void RemoverTodos()
        {
            _context.HttpContext.Session.Clear();
        }
    }
}
</code>
</pre>
</div>

@endsection