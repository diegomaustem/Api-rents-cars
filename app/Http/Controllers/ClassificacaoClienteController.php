<?php

namespace App\Http\Controllers;

use App\Models\ClassificacaoCliente;
use Illuminate\Http\Request;

class ClassificacaoClienteController extends Controller
{
    public function __construct(ClassificacaoCliente $classificacaoCliente)
    {
        $this->classificacaoCliente = $classificacaoCliente;

    }

    public function index()
    {
        $classificacoes = $this->classificacaoCliente->all();

        return response()->json($classificacoes, 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->classificacaoCliente->rules(), $this->classificacaoCliente->feedback());

        $classificacao = ClassificacaoCliente::create($request->all());

        return response()->json($classificacao, 201);
    }

    public function show($id)
    {
        $classificacaoCliente = $this->classificacaoCliente->find($id);

        if(empty($classificacaoCliente)) {
            return response()->json(['msg'=> 'Classificação não encontrada.'], 404);
        }

        return response()->json($classificacaoCliente, 200);
    }

    public function update(Request $request, $id)
    {
        $classificacao = $this->classificacaoCliente->find($id);

        if(empty($classificacao)) {
            return response()->json(['msg'=> 'Atualização não pode ser realizada.'], 404);
        }

        $classificacao->update($request->all());

        return response()->json(['msg'=> 'Classificação atualizada.'], 200);
    }

    public function destroy($id)
    {
        $classificacao = $this->classificacaoCliente->find($id);

        if(empty($classificacao)) {
            return response()->json(['msg'=> 'Não foi possivel excluir classificação.'], 404);
        }

        $classificacao->delete();

        return response()->json(['msg'=> 'Classificação excluida.'], 200);
    }
}
