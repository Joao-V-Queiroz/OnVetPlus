<?php

namespace App\Http\Controllers\Data\Rebanho;

use App\Http\Controllers\Controller;
use App\Models\Rebanho\Embriao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use Exception;

class EmbriaoController extends Controller
{
    protected $model = Embriao::class;
    public function save(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'tipo' => 'required',      
        ]);

        if ($validate->fails()) {
            return response()->json($validate->messages(), 400);
        }

        try {
            $embriao = $this->model::findOrNew($request->id);
            $embriao->nome = $request->nome;
            $embriao->tipo = $request->tipo;
            $embriao->congelamento = $request->congelamento;
            $embriao->grau = $request->grau;
            $embriao->animal_id = $request->animal_id;
            $embriao->animais_id = $request->animais_id;
            $embriao->observacao = $request->observacao;
            $embriao->save();
            return $embriao;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Sêmen!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
