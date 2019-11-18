@extends('adminlte::page')

@section('title', 'Histórico de Movimentação')

@section('content_header')
    <h1 class="m-0 text-dark">Histórico de Transações</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">DashBoard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Histórico</li>
    </ol>
@stop

@section('content')
<div class="container">
    <div class="container">
        <form action="{{ route('historic.search') }}" method="post" class="form-inline">
            @csrf
            <input type="text" name="id" class="form-control" placeholder="ID">
            <input type="date" name="date" class="form-control" placeholder="Data">
            <select name="type" class="form-control">
                <option value="">-- Selecione o Tipo --</option>
                @foreach ($types as $key => $type)
                    <option value="{{ $key }}">{{ $type }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-dark">Pesquisar</button>
        </form>
    </div>
    <div class="">
        <table class="table table-hover table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Sender</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($historic as $reg)
                    <tr>
                        <td>{{ $reg->id }}</td>
                        <td>{{ number_format($reg->amount, 2, '.', '') }}</td>
                        <td>{{ $reg->type($reg->type) }}</td>
                        <td>{{ $reg->date }}</td>
                        <td>
                        @if ($reg->user_id_transaction)
                            {{ $reg->userSender->name }}
                        @else
                            -
                        @endif
                        
                        </td>
                    </tr>
                @empty
                    
                @endforelse

            </tbody>
        </table>
        @if (isset($dataForm))
            {!! $historic->appends($dataForm)->links() !!}
        @else
            {!! $historic->links() !!}
        @endif
    </div>
</div>
@stop