@extends('Layout/_layout')
@section('titulo', 'AspNetCore')
@section('conteudo')

<h3>Area</h3>

<p>
    Botão direito na raiz do projeto. <br>
    Add / Area <br>
</p>

<p>
    Uma pasta Areas é criada, com outro diretório com o nome da area que foi dada. <br>
    Dentro deste diretório é criado um mini sistema MVC, uma pasta Controller, Data, Models e Views. <br>
    Depende do projeto, é interessante manter tudo diferenciado, por isso a criação destas pastas. Porém, 
    em muitos casos o banco de dados é centralizado, e por isso não faz sentido manter a pasta data e models. <br>
    Se esses modelos irão ficar acessiveis ao resto do sistema, crie direto na raiz do sistema, 
</p>

<p>
    Para área funcionar, deve ser feito uma verificação na classe Startup. <br>
    Isso é feito adicionando uma rota para area, antes da rota padrão (A rota padrao pode ser removida, já que 
    se a area não existe vai ser encaminhado para a rota padrao). Algumas coisas podem dar errado aqui nesse ponto, 
    pois o curso é da versão 2.2 do Asp.NetCore e o que estou utilizando é o 3.0. <br>
    No 2.2 ele utiliza o sistema de rotas do serviço MVC, já no 3.0 é utilizado um serviço de endpoints. Então 
    foram feitas algumas alterações. 
</p>

<p>
    <b>identificando a Area</b> <br>
    Minha area Colaborador, também tem um HomeController, mesmo digitando a rota no navegador certinho, 
    /Colaborador/Home/Login , a view é exibida em branco. <br>
    Para que haja uma diferenciação entre qual home o sistema vai acessar, existe a necessidade de adicionar 
    um attribute (Annotation), dentro do controlador da área. Por exemplo: <br>
</p>
<div class="codigo">
<pre wrap="true">
<code>
namespace LojaVirtual.Areas.Colaborador.Controllers
{
    [Area("Colaborador")]
    public class HomeController : Controller
    {
        public IActionResult Login()
        {
            return View();
        }
    }
}
</code>
</pre>
</div>

<h5><b>Layout de Páginas</b></h5>

<p>
    Os ViewsImports, como visto anteriormente, refletem apenas na pasta raiz em que está e suas subpastas então, 
    obviamente o _Layout da raiz da aplicação não atinge as views da Área. Não vejo muito sentido nisso também, afinal, 
    a idéia de area é que a experiencia de usuário em diferentes areas seja completamente diferente, trazendo funções 
    especificas à aplicação que não é acessivel a um usuário comum.
</p>

@endsection