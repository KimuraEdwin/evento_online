@extends('layouts.app_user')

@section('content')
<div class="container mt-5">
    <div class="card">
        <h2 class="card-header">
            {{ $title }}
            <span class="float-right">
                <a href="{{ route('caduser.edit', ['caduser' => $caduser->id]) }}">
                    Editar
                </a>
            </span>
        </h2>
        
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h4>CPF</h4>
                            <p class="text-black pl-2">{{ $caduser->cpf }}</p>
                        </div>
                        <div class="col-sm-6">
                            <h4>Telefone</h4>
                            <p class="text-black pl-2">{{ $caduser->tel }}</p>
                        </div>
                    </div>   
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <h4>CEP</h4>
                            <p class="text-black pl-2">{{ $caduser->cep }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h4>Logradouro</h4>
                            <p class="text-black pl-2">{{ $caduser->logradouro }}</p>
                        </div>
                        <div class="col-sm-2">
                            <h4>Número</h4>
                            <p class="text-black pl-2">{{ $caduser->numero }}</p>
                        </div>
                        <div class="col-sm-4">
                            <h4>Bairro</h4>
                            <p class="text-black pl-2">{{ $caduser->bairro }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h4>Cidade</h4>
                            <p class="text-black pl-2">{{ $caduser->cidade }}</p>
                        </div>
                        <div class="col-sm-6">
                            <h4>UF</h4>
                            <p class="text-black pl-2">{{ $caduser->estado }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Complemento</h4>
                            <p class="text-black pl-2">{{ $caduser->complemento }}</p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12">
                            <h4>Tipo de cadastro</h4>
                            <p class="text-black pl-2">{{ $caduser->userGer == 1 ? 'Gerência' : 'Credencial' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection