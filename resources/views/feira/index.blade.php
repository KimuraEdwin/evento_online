@extends('layouts.app_user')

@section('content')
<section id="content-body-expositores-blur">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 side_navbar_nav">
                @component('_components.side_nav')
                    
                    <a class="nav-link text-white my-3 active" id="v-pills-evento-aberto-tab" data-toggle="pill" href="#v-pills-evento-aberto" role="tab" aria-controls="v-pills-evento-aberto" aria-selected="true">Eventos Abertos</a>
                    <a class="nav-link text-white my-3" id="v-pills-evento-fechado-tab" data-toggle="pill" href="#v-pills-evento-fechado" role="tab" aria-controls="v-pills-evento-fechado" aria-selected="false">Eventos Fechados</a>
                    
                @endcomponent
            </div>
            <div class="col-md-10 d-flex flex-column justify-content-sm-center align-items-sm-center py-4">
                <div class="tab-content h-75 w-100" id="v-pills-tabContent">
                    <div class="tab-pane fade h-100 show active" id="v-pills-evento-aberto" role="tabpanel" aria-labelledby="v-pills-evento-aberto-tab">
                        <div class="card h-100 w-75 mx-auto">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-evento-fechado" role="tabpanel" aria-labelledby="v-pills-evento-fechado-tab">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection