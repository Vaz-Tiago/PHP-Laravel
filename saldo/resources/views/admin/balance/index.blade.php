@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">DashBoard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Saldo</li>
    </ol>
@stop

@section('content')
<div class="container">
    <div class="container">
        <a href="{{ route('balance.deposit') }}" class="btn btn-success">
            <i class="far fa-plus-square"></i>
            &nbsp;
            Depositar 
        </a>
        
        @if ($amount > 0)
            <a href="{{ route('balance.withdraw') }}" class="btn btn-danger">
                <i class="far fa-minus-square"></i>
                &nbsp;
                Sacar
            </a>

            <a href="{{ route('balance.transfer') }}" class="btn btn-info">
                <i class="fas fa-exchange-alt"></i>
                &nbsp;
                Transferir
            </a>
        @endif

    </div>
    <br>
    @include('admin.includes.alerts')
    <div class="small-box bg-gradient-gray">
        <div class="inner">
        <h3>R$ {{ number_format( $amount, 2, '.', '') }}</h3>
        </div>
        <div class="icon">
            <i class="fas fa-money-check-alt"></i>
        </div>
        <br>
        <a href="#" class="small-box-footer">Histórico<i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
@stop