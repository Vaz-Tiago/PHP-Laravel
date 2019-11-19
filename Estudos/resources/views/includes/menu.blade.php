<div class="navbar-fixed">
    <nav>
        @if ( $info['secao'] == 'AspNetCore')
            <div class="nav-wrapper deep-purple lighten-2">
        @elseif( $info['secao'] == 'Laravel')
            <div class="nav-wrapper deep-orange lighten-2">
        @else 
            <div class="nav-wrapper blue">      
        @endif
            <div class="container">
                <a class="brand-logo center hide-on-large-only">{{$info['titulo']}}</a>
                <a class="brand-logo show-on-large">{{$info['titulo']}}</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a><spam data-target="AspNetCore" class="white-text sidenav-trigger">AspNetCore</spam></a></li>
                    <li><a><spam data-target="Laravel" class="white-text sidenav-trigger">Laravel</spam></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<ul class="sidenav" id="mobile-demo">
    <li><a href="#">AspNetCore</a></li>
    <li><a href="#">Laravel</a></li>
</ul>


{{-- Menu Desktop AspNetCore  --}}


<ul id="AspNetCore" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background nv-background deep-purple">
        </div>
        <h4 class="white-text">Asp .Net Core</h4>
        <a href="#email">
            <span class="white-text email">
                tiago.vaz@hotmail.com
            </span>
        </a>
    </li>
    <li><a href="https://github.com/Vaz-Tiago/CursoAspNetCore" target="_blank"><i class="material-icons">cloud</i>VER NO GITHUB</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Tópicos</a></li>
    <li @if($info['submenu'] == 'Area')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Area')}}">
            Area
        </a>
    </li>
    <li @if($info['submenu'] == 'Controllers')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Controllers')}}">
            Controllers
        </a>
    </li>
    <li @if($info['submenu'] == 'Crud')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Crud')}}">
            CRUD
        </a>
    </li>
    <li @if($info['submenu'] == 'Email')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Email')}}">
            Email
        </a>
    </li>
    <li @if($info['submenu'] == 'Filters')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Filters')}}">
            Filters
        </a>
    </li>
    <li @if($info['submenu'] == 'InjecaoDependencias')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.InjecaoDependencias')}}">
            Injeção de Dependências
        </a>
    </li>
    <li @if($info['submenu'] == 'Layout')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Layout')}}">
            Layout
        </a>
    </li>
    <li @if($info['submenu'] == 'Login')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Login')}}">
            Login
        </a>
    </li>
    <li @if($info['submenu'] == 'Mid')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Mid')}}">
            Middleware
        </a>
    </li>
    <li @if($info['submenu'] == 'Models')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Models')}}">
            Models
        </a>
    </li>
    <li @if($info['submenu'] == 'Mvc')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Mvc')}}">
            MVC
        </a>
    </li>
    <li @if($info['submenu'] == 'Paginacao')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Paginacao')}}">
            Paginação
        </a>
    </li>
    <li @if($info['submenu'] == 'Razor')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Razor')}}">
            Razor
        </a>
    </li>
    <li @if($info['submenu'] == 'Repository')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Repository')}}">
            Repository
        </a>
    </li>
    <li @if($info['submenu'] == 'ResourceFile')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.ResourceFile')}}">
            Resource File
        </a>
    </li>
    <li @if($info['submenu'] == 'Rotas')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Rotas')}}">
            Rotas
        </a>
    </li>
    <li @if($info['submenu'] == 'Session')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Session')}}">
            Session
        </a>
    </li>
    <li @if($info['submenu'] == 'UWork')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.UWork')}}">
            Unity Of Work
        </a>
    </li>
    <li @if($info['submenu'] == 'Views')? class="subheader active" : class="" @endif>
        <a class="waves-effect waves-purple" href="{{route('AspNetCore.Views')}}">
            Views
        </a>
    </li>
    <br><br>
</ul>


{{-- Menu Desktop Laravel --}}



<ul id="Laravel" class="sidenav">
        <li>

            <div class="user-view">
                <div class="background nv-background deep-orange">
            </div>

            <h4 class="white-text">Laravel 6.0</h4>

            <a href="#email">
                <span class="white-text email">
                    tiago.vaz@hotmail.com
                </span>
            </a>
        </li>

        <li>
            <a href="https://github.com/Vaz-Tiago/CursoLaravel" target="_blank">
                <i class="material-icons">cloud</i>
                VER NO GITHUB
            </a>
        </li>

        <li><div class="divider"></div></li>

        <li><a class="subheader">Tópicos</a></li>

        <li @if($info['submenu'] == 'AdminLTE')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.AdminLTE')}}">
                AdminLTE
            </a>
        </li>

        <li @if($info['submenu'] == 'Assets')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Assets')}}">
                Assets
            </a>
        </li>

        <li @if($info['submenu'] == 'Filtros')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Filtros')}}">
                Filtros
            </a>
        </li>

        <li @if($info['submenu'] == 'Login')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Login')}}">
                Login
            </a>
        </li>

        <li @if($info['submenu'] == 'Migrations')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Migrations')}}">
                Migrations
            </a>
        </li>

        <li @if($info['submenu'] == 'Models')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Models')}}">
                Models
            </a>
        </li>

        <li @if($info['submenu'] == 'Paginacao')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Paginacao')}}">
                Paginação
            </a>
        </li>
        
        <li @if($info['submenu'] == 'Rotas')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Rotas')}}">
                Rotas
            </a>
        </li>

        <li @if($info['submenu'] == 'Seeders')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Seeders')}}">
                Seeders
            </a>
        </li>

        <li @if($info['submenu'] == 'validacaoFormulario')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.ValidacaoFormulario')}}">
                Validação Formulário
            </a>
        </li>

        <li @if($info['submenu'] == 'Verbos')? class="subheader active" : class="" @endif>
            <a class="waves-effect waves-red" href="{{route('Laravel.Verbos')}}">
                Verbos
            </a>
        </li>

    </ul>
            