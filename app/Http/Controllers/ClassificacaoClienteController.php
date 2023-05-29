<?php

namespace App\Http\Controllers;

use App\Models\ClassificacaoCliente;
use Illuminate\Http\Request;

class ClassificacaoClienteController extends Controller
{
    public function index()
    {
        $classificacoes = ClassificacaoCliente::all();

        return response()->json($classificacoes, 200);
    }

    public function store(Request $request)
    {
        $classificacao = ClassificacaoCliente::create($request->all());

        return response()->json($classificacao, 201);
    }

    public function show(ClassificacaoCliente $classificacaoCliente)
    {
        return response()->json($classificacaoCliente, 200);
    }

    public function update(Request $request, ClassificacaoCliente $classificacaoCliente)
    {
        $classificacaoCliente->update($request->all());

        return $classificacaoCliente;
    }

    public function destroy(ClassificacaoCliente $classificacaoCliente)
    {
        $classificacaoCliente->delete();
    }
}
