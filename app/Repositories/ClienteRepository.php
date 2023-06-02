<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ClienteRepository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function recuperaClientes($clienteRepository)
    {
        return $this->model = $this->model->all();
    }
}
