@extends('layout.site')

@section('titulo', 'Cursos')

@section('conteudo')

    <div class="container">
        <h3 class="center">Lista de Cursos</h3>

        <div class="row">
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Publicado</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->titulo }}</td>
                        <td>{{ $registro->descricao }}</td>
                        {{-- sempre que for trabalhar com link, utilizar o helper asset do laravel --}}
                        <td>
                            <img width="90" height="45" src="{{ asset($registro->imagem) }}" alt="{{ $registro->titulo }}" />
                        </td>
                        <td>{{ $registro->publicado }}</td>
                        <td>
                            <a class="btn-small deep-orange" href="{{ route('admin.cursos.editar', $registro->id) }}">
                                Editar
                            </a>
                            <a class="btn-small red" href="{{ route('admin.cursos.deletar', $registro->id) }}">
                                Deletar
                            </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn blue" href="{{ route('admin.cursos.adicionar') }}">Adicionar</a>
        </div>
    </div>

    
@endsection