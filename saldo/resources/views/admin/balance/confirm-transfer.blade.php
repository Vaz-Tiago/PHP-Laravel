@extends('adminlte::page')

@section('title', 'Depositar')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.balance')}}">Saldo</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balance.transfer')}}">Transferir</a></li>
        <li class="breadcrumb-item active" aria-current="page">Confirmação</li>
    </ol>
@stop

@section('content')
    <div class="card bg-gradient-info">
        <h4 class="card-header">
            <i class="fas fa-exchange-alt"></i>
            &nbsp;
            Confirmar Transferência
        </h4>
        <div class="card-body">
            <div class="row">
                <div class="col md-6">
                    <p>
                        <b>Recebedor: </b><br>
                        <b>Nome: </b> {{ $sender->name }} <br>
                        <b>Email: </b> {{ $sender->email}} <br>
                    </p>
                </div>
                <div class="col md-6">
                    <b>Meu Saldo: </b> R$ {{ number_format($balance->amount, '2', '.', '') }}<br>
                </div>
            </div>


            @include('admin.includes.alerts')

            <form method="post" action="{{ route('transfer.store')}}" class="form-inline">
                @csrf

                <input type="hidden" name="senderId" value="{{ $sender->id }}">
                <div class="form-group">
                    <input name="value" type="text" placeholder="Valor" class="form-control">
                </div>
                <div class="form-group">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-light"> 
                        Transferir
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
