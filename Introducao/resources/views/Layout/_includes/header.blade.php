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

                <div class="nav-wrapper  light-green darken-4">
                    <a href="#!" class="brand-logo" style="padding-left: 50px;">Curso de Laravel</a>
                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down" style="padding-right: 50px;">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                    </ul>
                </div>
            </nav>
        </div>
            
        <ul class="sidenav" id="mobile">
            <li><a href="/">Home</a></li>
        <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
        </ul>

    </header>