@extends('adminlte::page')

@section('title', 'Depositar')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.balance')}}">Saldo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transferir</li>
    </ol>
@stop

@section('content')
    <div class="card bg-gradient-info">
        <h4 class="card-header">
            <i class="fas fa-exchange-alt"></i>
            &nbsp;
            Fazer Transferência <small>(Informe os dados de quem vai receber)</small>
        </h4>
        <div class="card-body">

            @include('admin.includes.alerts')

            <form method="post" action="{{ route('confirm.transfer')}}">
                @csrf
                <div class="form-group">
                    <input name="sender" type="text" placeholder="Para quem deseja transferir? (Nome ou Email)" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-light"> 
                        Próxima Etapa
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
