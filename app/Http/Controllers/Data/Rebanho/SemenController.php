<?php

namespace App\Http\Controllers\Data\Rebanho;

use App\Http\Controllers\Controller;
use App\Models\Rebanho\Semen;
use App\Models\Rebanho\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use Exception;

class SemenController extends Controller
{
    protected $model = Semen::class;
    public function save(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'raca' => 'required|max:255',
            'nome' => 'required|max:255', 
            'registro' => 'required', 
        ]);

        if ($validate->fails()) {
            return response()->json($validate->messages(), 400);
        }

        try {
            $semen = $this->model::findOrNew($request->id);
            $semen->nome = $request->nome;
            $semen->registro = $request->registro;
            $semen->raca =  $request->raca;
            $semen->central = $request->central;
            $semen->tipos = $request->tipos;

            $semen->raca_2 = $request->raca_2;
            $semen->sangue =  $request->sangue;
            $semen->animal_id = $request->animal_id;
            $semen->animais_id = $request->animais_id;

            $semen->tec = $request->tec;
            $semen->partida = $request->partida;

            $semen->observacao = $request->observacao;
            
            $semen->save();
            return $semen;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Sêmen!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
