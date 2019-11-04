@extends('Layout/_layout')

@section('titulo', 'Asp.NetCore')

@section('conteudo')
	

<h3>Rotas</h3>

<p>
    São os caminho que levam até os controladores. <br>
    Ao entrar no site a rota default nos encaminha para um controller que diz o que deve acontecer. <br>
    <p>
        <b>https://site.com/controller/metodo/argumento</b><br>
    </p>
    A rota desta url ficaria assim: <br>
    app.UseEndpoints(endpoints =>
    {
        endpoints.MapControllerRoute 
        (
            name: "default",
            pattern: "{ controller = Home } / { action = Index } / { id? } " 
        );
    });
</p>

@endsection