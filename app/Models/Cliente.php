<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['cpf','nome','idade','email','classificacao_cliente_id'];

    public function rules()
    {
        return [
            'nome'   => 'required',
            'cpf'    => 'required|unique:clientes|max:14',
            'idade'  => 'required|max:3',
            'nome'   => 'required',
            'email'  => 'required',
            'classificacao_cliente_id' => 'required'
        ];
    }

    public function feedback()
    {
        return [
            'required'   => 'O campo :attribute é obrigatório.',
            'cpf.unique' => 'O cpf já existe.',
            'cpf.max'    => 'O cpf não pode ter mais que 11 números.',
            'idade.max'  => 'Idade não pode ultrapassar o três digitos.',
        ];
    }

    public function classificacaoCliente()
    {
        return $this->hasOne(ClassificacaoCliente::class);
    }

    public function aluguel()
    {
        return $this->hasOne(Aluguel::class);
    }
}
