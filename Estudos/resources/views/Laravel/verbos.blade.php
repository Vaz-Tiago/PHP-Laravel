@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')

<h5><b>Verbalização REST e Injeção de dependências</b></h5>

<h5>Verbo GET</h5>
<p>
    Responsável por Obter informação da aplicação. <br>
    Qualquer tipo de dado pode ser passado via GET para uma rota. No php 7 os métodos podem receber a definição 
    do tipo de dados, ou seja, caso a entrada ou saída de dados não seja a esperada ocorre um erro que impede 
    a aplicação de continuar. <br>
    Isso é importante para que códigos maliciosos não afetem a aplicação.
</p>

<h5>Verbo POST</h5>

<p>
    Responsável por Inserir informações para a aplicação <br>
    Estas informações são passadas de maneira oculta para o usuário, ou seja, diferente do GET, não é gerado 
    um retorno visual na URL, sendo assim não é possível enviar dados que não sejam os solicitados pela aplicação <br>
</p>
<p>
    Toda informação que é transmitida por meio de um formulário, fica armezenada em um <b>Objeto Request</b>, ou seja 
    para resgatar os dados informados por um usuário, é só fazer a injeção destes dados no método desejado. <br>
    Também é necessário um <b>use Illuminate\Http\Request;</b>. Essa chamada já vem por padrão caso o controller 
    tenha sido criado pelo artisan.
</p>
<div>
    
</div>
<blockquote class="grey lighten-5">
    Existem Várias maneiras de fazer estas mesmas funcionalidades, porém, ao fazer desta forma, 
    o Laravel garante a integridade da aplicação pois mantém ativo o sistema de segurança
</blockquote>


<h5> Verbos PUT / PATCH</h5>
<p>
    São responsáveis pelas Atualizações na aplicação. <br>
    Para um update simples no banco de dados tanto faz utilizar um ou outro, eles fazem a mesma coisa, porém 
    cada um tem suas particularidades que ainda não pesquisei. <br>
</p>
<p>
    Aqui as coisas funcionam um pouco diferente. Não existe um método específico pois são uma funções do Laravel, 
    ou seja, o method do formulário vai ser POST, e este method vai ser informado pelo helper 
    <b>@@method('PUT')</b> ou <b>@@method('PATCH')</b>. <br>
    Isso vai criar um inout hidden com as informações necessárias para o lavarel.
</p>
<p>
    A action do formulário precisa passar na rota da ação o identificador do registro que será editado. Isse é feito 
    passando a rota e um Array com as informações de identificação que foram utilizadas para chegar até a tela de 
    edição da informação.
</p>

<h5>Verbo DELETE</h5>
<p>
    Responsável por remover qualquer informação da aplicação. <br>
    O ideal é direcionar para uma rota que esteja ouvindo o verbo Delete e que solicite a confirmação da ação. <br>
    Aplicação assemelha-se muito com a da edição. <br>
    Devido a verbalização, é necessário disparar um formulário como gatilho da ação, ou seja, se o delete for 
    direcionado via Link, não vai funcionar, pois todo link passa informações via GET.
</p>

<h5>CSRF TOKEN</h5>

<p>
    Dispositivo de segurança do Laravel, é <b>obrigatório</b> em todos os formulários. <br>
    Um campo oculto que possuí uma hash de acesso que é mantida dentro do servidor para a verificação e validação 
    de dados. Autamente criptografada para manter a integridade do sistema. Caso não informado, a solicitação 
    retorna um erro 419. <br>
    <br>
    Dentro do < form > é só informar o helper @@csrf e automaticamente o laravel cria um campo oculto com 
    o token necessário para validar as informações.
</p>


@endsection