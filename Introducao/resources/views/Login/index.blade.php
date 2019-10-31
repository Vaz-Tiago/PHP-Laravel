@extends('layout.site')

@section('titulo', 'Login')

@section('conteudo')

    <div class="container">
        <div class="row">
            <h3>Entrar</h3>
            @if (isset($_GET['erro']))
            <blockquote>
                Usuário não Existe<br>
                Tente novamente o entre em contato com o administrador
            </blockquote>
            @endif
            <form action="{{route('site.login.entrar')}}" method="post">
                {{ csrf_field() }}

                <div class="input-field">
                    <input name="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="password" name="senha">
                    <label for="titulo">Senha</label>
                </div>

                <button class="btn deep-orange">Entrar</button>
            </form>
        </div>
    </div>

    
@endsection