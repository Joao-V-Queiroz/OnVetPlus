<?php

namespace App\Http\Controllers\Data\Rebanho;

use App\Http\Controllers\Controller;
use App\Models\Rebanho\Lote;
use Illuminate\Http\Request;

use Exception;

class LoteController extends Controller
{
    protected $model = Lote::class;
    public function save(Request $request)
    {
        try {
            $lote = $this->model::findOrNew($request->id);
            $lote->nome = $request->nome;
            $lote->desc = $request->desc;
            $lote->abv =  $request->abv;
            $lote->sexo = $request->sexo;
            $lote->fase = $request->fase;
            $lote->observacao = $request->observacao;
            $lote->ativo = $request->ativo ?? 0;
            $lote->save();
            return $lote;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Lote!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
