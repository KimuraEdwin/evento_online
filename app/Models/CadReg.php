<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadReg extends Model
{
    use HasFactory;
    protected $fillable = [
        'cad_user_id',
        'token',
    ];

    public function rules(){
        return [
            'cad_user_id' => 'required|exists:cad_users',
            'token' => 'required',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'cad_user_id.exists' => 'Esta chave informada não existe',
        ];
    }
}
