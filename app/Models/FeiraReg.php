<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeiraReg extends Model
{
    use HasFactory;
    protected $table = 'evento_regs';
    protected $fillable = [
        'evento_id',
        'cad_user_id',
        'token',
    ];

    public function rules(){
        return [
            'evento_id' => 'required|exists:eventos',
            'cad_user_id' => 'required|exists:cad_users',
            'token' => 'required',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'evento_id.exists' => 'Esta chave informada não existe',
            'cad_user_id.exists' => 'Esta chave informada não existe',
        ];
    }
}
