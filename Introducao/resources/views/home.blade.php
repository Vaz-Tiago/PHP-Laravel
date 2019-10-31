@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')

    <div class="container">
        <h4>Cursos Disponíveis</h4>

        <div class="row">
            @foreach ($cursos as $curso)
                <div class="col s12 m4">
                    <div class="card">
                    <div class="card-image">
                        <img src="{{asset($curso->imagem)}}">
                        
                    </div>
                    <div class="card-content">
                        <h5>{{$curso->titulo}}</h5>
                        <p>
                            {{ $curso->descricao}}
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="#">Mais Detalhes</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row center">
            <ul class="pagination">
                {{$cursos->links()}}
            </ul>
            
        </div>
    </div>

    
@endsection