@extends('layouts.app_user')

@section('content')
<div class="container mt-5">
    <div class="card">
        @component('caduser._components.cad_content', 
            ['title' => 'Alteração de Acesso', 'caduser' => $caduser, 'ufs' => $ufs, 'tipoCredenciais' => $tipoCredenciais])
            <input type="hidden" name="user_id" value="{{ $caduser->user_id }}">
        @endcomponent
    </div>
</div>
    
@endsection