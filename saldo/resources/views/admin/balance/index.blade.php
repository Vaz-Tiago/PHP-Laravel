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
        <a href="{{route('balance.deposit')}}" class="btn btn-primary">Depositar <i class="fas fa-cart-plus"></i></a>
        <a href="" class="btn btn-danger">Sacar <i class="fas fa-cart-arrow-down"></i></a>
    </div>
    <br>
    <div class="small-box bg-green">
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