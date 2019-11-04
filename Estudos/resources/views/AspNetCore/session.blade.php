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

    <b>services.AddMemoryCache()</b> -> Guarda na memória; <br>
    <b>services.AddDistributedMemoryCache()</b> - Utilizado para projetos de grande porte, onde a escalabilidade é horizontal,
    E os tráfego de dados é distribudo em vários servidores; <br>
    <b>
        Services.AddSession(option => <br>
        {
            //Dentro de options podemos fazer toda a configuração da sessão. <br>
        &nbsp;&nbsp;&nbsp;&nbsp; options.IdleTimeOut 
    </b><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-> Tempo que o usuário pode ficar inativo e o sistema mantem
        a sessão. Inativo, neste caso, é o período sem entrar no site. O valor padrão é 20 minutos. <br>
        Importante ressaltar que isto tem impacto direto no desempenho. Pois muitas sessões inativas, tem um impacto
        direto nas sessões que estão ativas. <br>
    <b>
        &nbsp;&nbsp;&nbsp;&nbsp; options.IoTimeout ()
    </b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-> Tempo de espera de inatividade do navegador. <br>
        Aqui é o tempo que o usuário esta na página inativo. <br>
    <b>}</b> <br>
</p>

<b>Classe: Configure(); </b><br>
<p>
    App.UseSession(); <br>
    <small>Também antes do MVC.</small> <br>
</p>


<h3>escalabilidade</h3>

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


@endsection