@extends('adminlte::page')

@section('title', 'Depositar')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.balance.index')}}">Saldo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Depositar</li>
    </ol>
@stop

@section('content')
    <div class="card bg-dark">
        <h4 class="card-header">Fazer Recarga</h4>
        <div class="card-body">
            <form method="post" action="{{ route('deposit.store')}}">
                @csrf
                <div class="form-group">
                    <input name="value" type="text" placeholder="Valor recarga" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary">Recarregar</button>
                </div>
            </form>
        </div>
    </div>
@stop
