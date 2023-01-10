<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Area;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class AreaController extends Controller
{
    protected $model = Area::class;
    public function save(Request $request)
    {
        try {
            $area = $this->model::findOrNew($request->id);
            $area->nome = $request->nome;
            $area->tipo = $request->tipo;
            $area->dt_ini = $request->dt_ini;
            $area->dt_fim = $request->dt_fim;
            $area->ha = $request->ha;
            $area->util = $request->util;
            $area->observacao = $request->observacao;
            $area->ativo = $request->ativo ?? 0;
            $area->save();
            return $area;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar a área!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}