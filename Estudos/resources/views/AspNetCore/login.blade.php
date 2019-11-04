@extends('layout/_layout')

@section('titulo', 'AspNetCore')


@section('conteudo')
    
<h3>Login</h3>

<ul class="collection with-header">
    <li class="collection-header"> 
        <h5> Criando e Acessando Session</h5>
    </li>
    <li class="collection-item">
        <b>Setando a Session</b>
    </li>
    <li class="collection-item">
        [HttpPost] //Verificação dos dados <br>
        public IActionResult Login([FromForm] Cliente cliente) <br>
        { <br>
           &nbsp;&nbsp; //Como irão vir apenas o meail e a senha, não deve ser feita a verificação. <br>
           &nbsp;&nbsp; //Pois vários campos que não serão utilizados são obrigatórios <br>
            <br>
           &nbsp;&nbsp; if(cliente.Email == "tiago.vaz@hotmail.com" && cliente.Senha == "123456") <br>
           &nbsp;&nbsp; { <br>
            &nbsp;&nbsp; &nbsp;&nbsp; //logado <br>

            &nbsp;&nbsp; &nbsp;&nbsp; //Cria sessão <br>
            &nbsp;&nbsp; &nbsp;&nbsp;  //Guaradar na sessão qualquer informação sobre o cliente <br>
            &nbsp;&nbsp; &nbsp;&nbsp;  HttpContext.Session.Set("ID", new byte[] { 52 }); <br>
            &nbsp;&nbsp; &nbsp;&nbsp;  HttpContext.Session.SetString("Email", cliente.Email); <br>
            &nbsp;&nbsp; &nbsp;&nbsp;  HttpContext.Session.SetInt32("Idade", 25); <br>
            <br>
            &nbsp;&nbsp; &nbsp;&nbsp;  //Para funcionar o set String e o set int deve ser importado o namespace ASpNetCoreHttp
            <br><br>
            &nbsp;&nbsp; &nbsp;&nbsp; return new ContentResult() { Content = "Logado" };<br>
            &nbsp;&nbsp;} <br>
            &nbsp;&nbsp;else <br>
            &nbsp;&nbsp;{ <br>
                &nbsp;&nbsp; &nbsp;&nbsp;    //nao logado <br>
                &nbsp;&nbsp; &nbsp;&nbsp;    return new ContentResult() { Content = "Não Logado" }; <br>
            &nbsp;&nbsp; } <br>
        }
    </li>
    <li class="collection-item">
        <b>Acessando a Session </b>
    </li>
    <li class="collection-item">
        [HttpGet] <br>
        public IActionResult Painel() <br>
        { <br>
            &nbsp;&nbsp;//Acessando informações da sessão: <br>
            &nbsp;&nbsp;//para pegar o valor ID, utiliza-se esse metodo. <br>
            &nbsp;&nbsp;// Mas uma vez importado o namesapce Http, utiliza-se o GetSrting ou GetInt32 <br>
            <br><br>
            &nbsp;&nbsp;//TryGetValue() Precisa de dois parametros. <br>
            <br>
            &nbsp;&nbsp;byte[] UsuarioID; <br>
            &nbsp;&nbsp;if (HttpContext.Session.TryGetValue("ID", out UsuarioID )) <br>
            &nbsp;&nbsp; { <br>
            &nbsp;&nbsp;&nbsp;&nbsp;    return new ContentResult() { Content = "Usuario " + UsuarioID[0] + ". Logado" }; <br>
            &nbsp;&nbsp; } <br>
            &nbsp;&nbsp;else <br>
            &nbsp;&nbsp;{ <br>
            &nbsp;&nbsp;&nbsp;&nbsp;    return new ContentResult() { Content = "Acesso Negado!" }; <br>
            &nbsp;&nbsp;} <br>
        } <br>
    </li>
</ul>


@endsection