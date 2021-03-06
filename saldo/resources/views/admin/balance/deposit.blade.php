@extends('adminlte::page')

@section('title', 'Depositar')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.balance')}}">Saldo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Depositar</li>
    </ol>
@stop

@section('content')
    <div class="card bg-gradient-success">
        <h4 class="card-header">
            <i class="far fa-plus-square"></i>
            &nbsp;
            Fazer Depósito
        </h4>
        <div class="card-body">

            @include('admin.includes.alerts')

            <form method="post" action="{{ route('deposit.store')}}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input name="value" type="text" placeholder="Valor recarga" class="form-control">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <button type="submit" class="btn btn-light"> 
                        Depositar
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
