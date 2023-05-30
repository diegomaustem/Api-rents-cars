<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassificacaoCliente extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function rules()
    {
        return [
            'tipo'   => 'required'
        ];
    }

    public function feedback()
    {
        return [
            'required'   => 'O campo :attribute é obrigatório.'
        ];
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
