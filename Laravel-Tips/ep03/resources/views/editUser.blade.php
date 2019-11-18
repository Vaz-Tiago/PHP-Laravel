<!doctype html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
</head>
<body>
    
    <!-- 
    action ddo formulario precisa passar a rota da ação com o parametro do 
    usuário que vai ser editado. Isso é feito passando a rota e um vetor com as 
    informações que foram passadas anteriormente. O nome do parametro usado para
    enviar as informações deve ser o mesmo que foi passado para receber -->
    
    <form action="{{route('users.edit', ['user' => $user->id])}}" method="post">
        @csrf
        @method('PUT')
        <label for="">Nome do Usuário:</label>
        <input type="text" name="name" value="{{$user->name}}">
        
        <label for="">Emaildo Usuário:</label>
        <input type="email" name="email" value="{{$user->email}}">
        
        <label for="">Senhado Usuário:</label>
        <input type="password" name="password">
    
        <input type="submit" value="Editar Usuário">
    </form>
    
</body>
</html>