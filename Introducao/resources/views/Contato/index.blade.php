@extends('Layout.site') {{-- view filha de layout --}}
@section('titulo', 'Contatos') {{-- Inserindo valor na variavel titulo --}}


@section('conteudo') {{-- Definindo o valor da variavel conteudo --}}


<h3>Essa é a VIEW INDEX</h3>

@foreach($contatos as $contato)

<p>{{ $contato->Nome }}</p>
<p>{{ $contato->Telefone }}</p>

@endforeach

@endsection


