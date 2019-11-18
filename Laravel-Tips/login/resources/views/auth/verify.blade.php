@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu endereço de E-Mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação ofi enviado para o seu email.') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir, verifique seu email por um link de validação.') }}
                    {{ __('Se você não recebeu um email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para solicitar o reenvio') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
