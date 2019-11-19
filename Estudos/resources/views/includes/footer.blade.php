<div class="ajuste50px"></div>
@switch($info['secao'])
    @case('AspNetCore')
        <footer class="page-footer deep-purple lighten-4">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="white-text">Organizando o Conhecimento</h5>
                        <p class="white-text">Anotações de cursos que fiz em páginas web para facilitar minhas pesquisas futuras!!!</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright deep-purple lighten-3">
                <div class="container">
                    © 2019 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>
        @break
    @case('Laravel')
        <footer class="page-footer deep-orange lighten-4">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="black-text">Organizando o Conhecimento</h5>
                        <p class="grey-text">Anotações de cursos que fiz em páginas web para facilitar minhas pesquisas futuras!!!</p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright deep-orange lighten-3">
                <div class="container">
                    © 2019 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>
        @break
    @default
    <footer class="page-footer blue">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h5 class="white-text">Organizando o Conhecimento</h5>
                    <p class="white-text">Anotações de cursos que fiz em páginas web para facilitar minhas pesquisas futuras!!!</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright blue lighten-3">
            <div class="container">
                © 2019 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
@endswitch
