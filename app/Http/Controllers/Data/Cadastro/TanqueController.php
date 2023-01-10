<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Tanque;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class TanqueController extends Controller
{
    protected $model = Tanque::class;
    public function save(Request $request)
    {
        try {
            $tanque = $this->model::findOrNew($request->id);
            $tanque->nome = $request->nome;
            $tanque->litros = $request->litros;
            $tanque->observacao = $request->observacao;
            $tanque->ativo = $request->ativo ?? 0;
            $tanque->save();
            return $tanque;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Tanque!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}