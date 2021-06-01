<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tipo_credencial',
        'cpf',
        'tel',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'campo_1',
        'campo_2',
        'campo_3',
        'campo_4',
        'campo_5',
    ];


    public function rules(){
        return [
            'user_id' => 'required|exists:users,id',
            'tipo_credencial' => 'required',
            'cpf' => 'required|min:11|max:11',
            'tel' => 'required',
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
            'user_id.exists' => 'A chave informada não existe',
            'cpf.min' => 'O campo CPF deve ter no mínimo 11 caracteres',
            'cpf.max' => 'O campo CPF deve ter no máximo 11 caracteres',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
