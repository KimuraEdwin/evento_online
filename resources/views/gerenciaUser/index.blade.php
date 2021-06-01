@extends('layouts.app_user')

@section('content')
<section id="content-body-expositores-blur">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 side_navbar_nav">
                @component('_components.side_nav')
                    
                    <a class="nav-link text-white my-3 active" id="v-pills-gerenciar-tab" data-toggle="pill" href="#v-pills-gerenciar" role="tab" aria-controls="v-pills-gerenciar" aria-selected="true">Gerenciar Evento</a>
                    <a class="nav-link text-white my-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                    <a class="nav-link text-white my-3" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                    <a class="nav-link text-white my-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    
                @endcomponent
            </div>
            <div class="col-md-10 d-flex flex-column justify-content-sm-center align-items-sm-center py-4">
                <div class="tab-content h-75 w-100" id="v-pills-tabContent">
                    <div class="tab-pane fade h-100 show active" id="v-pills-gerenciar" role="tabpanel" aria-labelledby="v-pills-gerenciar-tab">
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
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection