@extends('layouts.app_user')

@section('content')
<section id="content-body-expositores-blur">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 side_navbar_nav">
                @component('_components.side_nav')
                    
                    <a class="nav-link text-white my-3 active" id="v-pills-evento-aberto-tab" data-toggle="pill" href="#v-pills-evento-aberto" role="tab" aria-controls="v-pills-evento-aberto" aria-selected="true">Eventos Abertos</a>
                    <a class="nav-link text-white my-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Eventos Fechados</a>
                    
                @endcomponent
            </div>
            <div class="col-md-10 d-flex flex-column justify-content-sm-between py-4">
                <div class="row justify-content-sm-center">
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                </div>
                <div class="row justify-content-sm-center">
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                </div>
                <div class="row justify-content-sm-center">
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                </div>
                <div class="row justify-content-sm-center">
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                    <div class="col-md-3 mx-2 d-flex stand-bg justify-content-center align-items-center">
                        <img src="https://picsum.photos/200" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection