<!doctype html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
</head>
<body>
    
    <!-- Action do formuçário é uma tagHelper com o nome da rota -->
    <form action="{{route ('users.store') }}" method="post">
        @csrf
        
        <label for="">Nome do Usuário:</label>
        <input type="text" name="name">
        
        <label for="">Emaildo Usuário:</label>
        <input type="email" name="email">
        
        <label for="">Senhado Usuário:</label>
        <input type="password" name="password">
    
        <input type="submit" value="Cadastrar Usuário">
    </form>
    
</body>
</html>