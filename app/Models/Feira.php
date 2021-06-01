<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feira extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $fillable = [
        'gerencia_id',
        'token',
        'nome',
        'data_ini',
        'data_fim',
        'desc_evento',
    ];

    public function rules(){
        return [
            'gerencia_id' => 'required|exists:gerencias,id',
            'token' => 'required',
            'nome' => 'required',
            'data_ini' => 'required',
            'data_fim' => 'required',
            'desc_evento' => 'required',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'gerencia_id' => 'A chave informada não existe'
        ];
    }
}
