@extends('layouts.app_user')

@section('content')
<div class="container mt-5">
    <div class="card">
        @component('caduser._components.cad_content', ['title' => 'Cadastro de Acesso','ufs' => $ufs, 'tipoCredenciais' => $tipoCredenciais])
        @endcomponent
    </div>
</div>
    
@endsection