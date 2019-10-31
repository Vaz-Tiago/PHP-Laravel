<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('titulo')</title>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav>

                <div class="nav-wrapper  deep-orange">
                    <a href="{{ route('site.home')}}" class="brand-logo" style="padding-left: 50px;">Curso de Laravel</a>
                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down" style="padding-right: 50px;">
                    <li><a href="{{ route('site.home')}}">Home</a></li>
                    @if (Auth::guest())
                        <li><a href="{{route('site.login')}}">Login</a></li>
                    @else
                        <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                        <li><a href="#">{{Auth::user()->name}}</a></li>
                        <li><a href="{{route('site.login.sair')}}">Logout</a></li>
                    @endif
                    </ul>
                </div>
            </nav>
        </div>
            
        <ul class="sidenav" id="mobile">
            <li><a href="/">Home</a></li>
            @if (Auth::guest())
                <li><a href="{{route('site.login')}}">Login</a></li>
            @else
                <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                <li><a href="#">{{Auth::user()->name}}</a></li>
                <li><a href="{{route('site.login.sair')}}">Logout</a></li>
            @endif
        </ul>

    </header>