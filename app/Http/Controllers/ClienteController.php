<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = $this->cliente->all();

        return response()->json($clientes, 200);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());

        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = $this->cliente->find($id);

        if(empty($cliente)) {
            return response()->json(['msg'=> 'Cliente não encontrado.'], 404);
        }

        return response()->json($cliente, 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = $this->cliente->find($id);

        if(empty($cliente)) {
            return response()->json(['msg'=> 'Atualização não pode ser realizada.'], 404);
        }

        $cliente->update($request->all());

        return response()->json(['msg'=> 'Cliente atualizado.'], 200);
    }

    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);

        if(empty($cliente)) {
            return response()->json(['msg'=> 'Não foi possivel excluir o cliente.'], 404);
        }

        $cliente->delete();

        return response()->json(['msg'=> 'Cliente excluido.'], 200);
    }
}
