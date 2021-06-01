<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expositor extends Model
{
    use HasFactory;
    protected $table = "expositores";
    protected $fillable = [
        'logo',
        'logomarca',
        'tel',
        'email',
        'descricao',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'linkSite',
        'linkWpp',
        'linkFacebook',
        'linkInstagram',
        'linkLinkedin',
        'catalogo_1',
        'catalogo_2',
        'catalogo_3',
        'catalogo_4',
        'catalogo_5',
    ];

    public function rules(){
        return [
            'logo' => 'required|mimes:jpg,jpeg,png',
            'logomarca' => 'required|min:3',
            'tel' => 'required',
            'email' => 'required|email|unique:expositores',
            'descricao' => 'required|min:3',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'logo.mimes' => 'Extensões permitidas: jpg, jpeg, png',
            'logomarca.min' => 'O campo deve ter no mínimo 3 caracteres',
            'email.email' => 'Por favor insira um e-mail válido',
            'email.unique' => 'Esse endereço de e-mail já existe',
            'descricao.min' => 'O campo deve ter no mínimo 3 caracteres',
        ];
    }


    
}
