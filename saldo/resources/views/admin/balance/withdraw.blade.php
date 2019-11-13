@extends('adminlte::page')

@section('title', 'Saque')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.balance')}}">Saldo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Saque</li>
    </ol>
@stop

@section('content')
    <div class="card bg-secondary">
        <h4 class="card-header">Fazer Saque</h4>
        <div class="card-body">

            @include('admin.includes.alerts')

            <form method="post" action="{{ route('withdraw.store')}}">
                @csrf
                <div class="form-group">
                    <input name="value" type="text" placeholder="Valor da Retirada" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@stop
