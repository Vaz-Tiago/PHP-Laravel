@extends('Layout/_layout')

@section('titulo', 'Laravel')

@section('conteudo')

<h5><b>Gerenciando Assets</b></h5>

<p>
    O único diretório com WebAccess do laravel é o public, ou seja, tudo que está dentro dele pode 
    ser acessado pela web.Porém, não jogamos nossos arquivos CSS ou JS dentro deste diretório. <br>
    Os arquivos de estilo e script são mantidos dentro do diretório resource que está sendo trabalhado 
    mando assim a organização e separação no ambiente de desenvolvimento. Esses arquivos só são enviados 
    para o diretório public quando estão prontos, processados, agrupados e devidamente minificado. <br>
    Todo esse processo de compilação e minificação é feito pelo Laravel Mix.
</p>

<p>
    Para ter acesso aos arquivos que estão dentro de resources é necessário intalar as dependências 
    via NPM. A listagem das dependências que serão instaladas estão no arquivo package.json <br>
    Node é um gerenciador de dependências do JavaScript, funciona para o js da forma que o 
    composer funciona para o PHP.
</p>


<blockquote>
    Para ter acesso ao NPM é necessário instalar o Node.js: <br>
    <a href="http://nodejs.org/en/" target="_blank">Download Node</a>
</blockquote>

<p>
    Para determinar o destino e a origem dos arquivos, assim como a forma como são compilados, 
    é necessário fazer a configuração do arquivo webpack.mix.js
</p>


<p>
    <b>Sintaxe: </b> <br>
</p>

<div class="codigo">
<pre wrap="true">
<code>
mix 
    .styles([
        'listaArquivosCss'
    ], 'caminhoPublicCss')

    .scripts([
        'listaArquivosJs'
    ], 'caminhoPublicJs')

    .version();
</code>
</pre>
</div>

<p>
    <ul class="browser-default">
        <li>
            A definição do tipo de arquivo deve SEMPRE ser definida no PLURAL: <br>
            <b>
                .styles( [ ], ' ' ) <br>
                .scripts( [ ], ' ' )
            </b>
        </li>
        <li>
            O primeiro parâmetro (Array), recebe a lista de arquivos. OBRIGATORIAMENTE deve ser passado 
            o caminho completo das URLs. <br>
        </li>
        <li>
            Os arquivos são lidos em ordem, de cima para baixo, portanto é importante listar os arquivos 
            na ordem que deverão ser lidos para evitar problemas.
        </li>
        <li>
            O segundo parametros (String), recebe o diretório e o arquivo que vai receber estes arquivos. <br>
            Todos os arquivos css serão agrupados em um único arquivo.
        </li>
        <li>
            NUNCA faça açterações nos arquivos direto na pasta public.
        </li>
    </ul>
</p>

<p>
    Depois de configurado, é necessário rodar um comando no terminal para fazer a compilação 
    dos arquivos. <br>
</p>

<blockquote>
    <b>Dev ou Production?</b> <br>
    npm run dev -> Gera um arquivo para ser utilizado em modo de desenvolvimento <br>
    npm run production -> Gera um arquivo para rodar em produção, pois tb minifica os arquivos gerados.
</blockquote>

<h5><b>Automatização Compilações</b></h5>

<p>
    Para que não seja necessário a todo momento ficar rodando no terminal os comandos de compilação, 
    é possível manter os arquivos sob vigia para sempre que houver uma alteração eles sejam recompilados. <br>
    O comando, assim como o <i>php artisan serve</i>, fica rodando e segundo plano até que seja finalizado 
    com ctrl + c
</p>
<blockquote>
    <b>npm run watch</b><br>
    Mantém a autocomplição dos arquivos listados
</blockquote>

<h5><b>A Ex-problemática do Cache</b></h5>
<p>
    Para evitar os rotineiros problemas de cache, o mix trabalha com versionamento, ou seja, 
    sempre que houver uma alteração, o browser é forçado a refazer os downloads e substituir os arquivos 
    que estão em cache. <br>
    Isso é feito pelo método .version(), dentro do arquivo webpack.mix.js 
</p>

<h5><b>Trabalhando com Áreas</b></h5>
<p>
    É possível configurar mais de uma Origem / Detino para os arquivos: <br>
</p>
<div class="codigo">
<pre wrap="true">
<code>
mix
    //Site
    .styles([
        'listaArquivosCss'
    ], 'caminhoPublicCss')

    .scripts([
        'listaArquivosJs'
    ], 'caminhoPublicJs')

    //Admin
    .styles([
        'listaArquivosCss'
    ], 'caminhoPublicCss')

    .scripts([
        'listaArquivosJs'
    ], 'caminhoPublicJs')


    .version();
</code>
</pre>
</div>


<h5><b>Chamando os Assets na View</b></h5>

<p>
    Há duas maneiras de chamar os arquivos dentro das views. Essas maneiras podem variar de acordo 
    com a técnica utilizada, por exemplo, se foi feito o versionamento dos arquivos para lidar com 
    o cache ou não. <br>
    Sem versionamento é utilizado o helper <b>{ { asset( ) } }</b>, que automaticamente busca os arquivos 
    dentro da pasta public da aplicação, portanto é importante atentar-se a não passar o caminho completo 
    da URL. <br>
    Porém, caso esteja sendo utilizado o versionamento, o helper utilizado é o <b>{ { mix( ) } }</b> o que 
    pode gerar outro problema, pois ele, diferente do asset( ), não faz a busca na pasta public, ou seja 
    é necessário chamar método <b>url( ) </b>antes dele para que a busca seja feita na raiz publica do projeto.
</p>

<blockquote>
    Sem Versionamento -> <b>{ { asset ('css/style.css') } }</b><br>
    Com Versionamento -> <b>{ { url (mix ('css/style.css') ) } }</b>
</blockquote>


<h5><b>Conflitos Rotas / Diretórios</b></h5>
<p>
    Durante este estudo ocorreu um pequeno problema de conflito entre a rota e o diretório admin. <br>
    Isso acontece porque estava sendo trabalhado em áreas, por exemplo, para acessar a área do admin, 
    foi criada uma rota /Admin; Ao mesmo tempo que, para organizar e segmentar a aplicação, ocorreu a 
    divisão em diretórios que continham seus arquivos de estilo e script próprios, sendo estes diretótios 
    /Site (Setor que é visível para todos) e /Admin (Setor de administração), então, quando 
    foi digitado /admin na URL para acessar a Área administrativa, não foi possível identificar se era uma 
    request de acesso a url ou acesso a pasta, resultando no retorno de um erro. <br>
    como estava utilizando o serve do artisan, o erro exibido foi: <br>
    <b>
        NOT FOUND <br>
        The requested resource /admin was not found on this server. <br>
    </b>
    Ao utilizar o servidor Apache do XAMPP, o erro foi: <br>
    <b>
        Acesso Negado <br>
        Erro 403 <br>
    </b>

    A resolução do problema foi bem simples, basta remonear a rota ou o diretório.

</p>


@endsection