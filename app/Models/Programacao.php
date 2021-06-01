<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacao extends Model
{
    use HasFactory;
    protected $table = 'programacoes';
    protected $fillable = [
        'evento_id',
        'expositor_id',
        'palestrante',
        'funcao',
        'tema',
        'data_ini',
        'hora_ini',
        'data_fim',
        'hora_fim',
        'duracao',
        'pdf',
    ];

    public function rules(){
        return [
            'evento_id' => 'required|exists:eventos',
            'expositor_id' => 'required|exists:expositores',
            'palestrante' => 'required',
            'funcao' => 'required',
            'tema' => 'required',
            'data_ini' => 'required',
            'hora_ini' => 'required',
            'data_fim' => 'required',
            'hora_fim' => 'required',
            'duracao' => 'required',
            'pdf' => 'mimes:pdf',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'evento_id.exists' => 'Esta chave informada não existe',
            'expositor_id.exists' => 'Esta chave informada não existe',
            'pdf.mimes' => 'O arquivo deve ser da extensão PDF',
        ];
    }
}
