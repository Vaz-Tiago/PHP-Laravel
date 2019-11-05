<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title class="@yield('titulo')">@yield('titulo')</title>

</head>
<body>

    <div class="row">
        <div class="col s3">
            @include('includes.menu')
        </div>
        <div class="col s9">
            @yield('conteudo')
        </div>
    </div>
    <script src="/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menus = document.querySelectorAll('.collapsible');
            var sanfona = M.Collapsible.init(menus);
            var material = document.querySelectorAll('.materialboxed');
            var imgs = M.Materialbox.init(material);
        });

        $pageTitle = $('title').attr('class');

        switch($pageTitle)
        {
            case 'Laravel':
                $("#mLaravel").attr('class', 'active');
                break;
            case 'AspNetCore':
                $("#mAspNetCore").attr('class', 'active');
                break;

        }
    </script>
</body>
</html>