@extends('layouts.app')

@section('content')
<section id="content" class="cadastro-login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">Verificação de E-mail</h3>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Um novo link foi enviado para seu e-mail.
                            </div>
                        @endif

                        Antes de prosseguir, por favor veririficar o endereço de e-mail.<br>
                        Caso não tenha recebido o e-mail, 
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui para reenviar</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section>
@endsection
