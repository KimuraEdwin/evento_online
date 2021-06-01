<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'cpf',
        'cnpj',
        'cod_ger',
        'empresa',
        'nome_usuario',
        'tel',
        'email',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'complemento',
    ];


    public function rules(){
        return [
            'cpf' => 'required|min:11|max:11',
            'empresa' => 'required',
            'nome_usuario' => 'required|min:3',
            'tel' => 'required',
            'email' => 'required|email|unique:gerencias',
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
            'cpf.min' => 'O campo CPF deve ter no mínimo 11 caracteres',
            'cpf.max' => 'O campo CPF deve ter no máximo 11 caracteres',
            'nome_usuario.min' => 'O campo Nome deve ter no mínimo 11 caracteres',
            'email.email' => 'Por favor insira um e-mail válido',
            'email.unique' => 'Esse endereço de e-mail já existe',
        ];
    }
}
