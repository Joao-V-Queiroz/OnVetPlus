<?php

namespace App\Http\Controllers\Data\Protocolo;

use App\Http\Controllers\Controller;
use App\Models\Protocolo\Iatf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class IatfController extends Controller
{
    protected $model = Iatf::class;
    public function save(Request $request)
    {
        try {
            $iatf = $this->model::findOrNew($request->id);
            $iatf->nome = $request->nome;
            $iatf->desc = $request->desc;
            $iatf->animal_id = $request->animal_id;
            $iatf->animais_id = $request->animais_id;
            $iatf->save();
            return $iatf;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o protocolo!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}