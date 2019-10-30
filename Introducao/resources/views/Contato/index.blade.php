<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Essa é a VIEW INDEX</h3>

@foreach($contatos as $contato)

<p>{{ $contato->Nome }}</p>
<p>{{ $contato->Telefone }}</p>

@endforeach
</body>
</html>

