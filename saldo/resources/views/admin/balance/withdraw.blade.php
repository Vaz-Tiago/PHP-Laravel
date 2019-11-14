@extends('adminlte::page')

@section('title', 'Saque')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.balance')}}">Saldo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sacar</li>
    </ol>
@stop

@section('content')
    <div class="card bg-gradient-danger">
        <h4 class="card-header">
            <i class="far fa-minus-square"></i>
            &nbsp;
            Fazer Saque
        </h4>
        <div class="card-body">

            @include('admin.includes.alerts')

            <form method="post" action="{{ route('withdraw.store')}}" class="form-inline">
                @csrf
                <div class="form-group">
                    <input name="value" type="text" placeholder="Valor do Saque" class="form-control">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <button type="submit" class="btn btn-light">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@stop
