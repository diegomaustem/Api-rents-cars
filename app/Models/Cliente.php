<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function classificacaoCliente()
    {
        return $this->hasOne(ClassificacaoCliente::class);
    }

    public function aluguel()
    {
        return $this->hasOne(Aluguel::class);
    }
}
