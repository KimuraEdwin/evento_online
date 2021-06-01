<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GerenciarEventoController extends Controller
{
    public function index(){
        return view('gerenciaUser.index');
    }
}
