<?php

namespace App\Http\Controllers\Data\Rebanho;

use App\Http\Controllers\Controller;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Exception;

class AnimalController extends Controller
{
    protected $model = Animal::class;
    public function save(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'lote_id' => 'required',
        ]);
        if (!$validate->fails()) {
            try {
                $animal = $this->model::findOrNew($request->id);
                $animal->nome = $request->nome;
                $animal->sexo = $request->sexo;
                $animal->video = $request->video;
                $animal->sangue =  $request->sangue;
                $animal->origem =  $request->origem;

                //itens hide, show
                $animal->dt_nasc = $request->dt_nasc;
                $animal->dt_entrada = $request->dt_entrada;
                $animal->peso = $request->peso;
                $animal->peso_entrada = $request->peso_entrada;
                $animal->nome_reg = $request->nome_reg;
                $animal->num_reg = $request->num_reg;
                $animal->pelagem = $request->pelagem;
                $animal->raca_2 = $request->raca_2;
                $animal->cat_macho= $request->cat_macho;
                $animal->cat_femea = $request->cat_femea;
                $animal->valor = $request->valor;


                $animal->raca = $request->raca;
                $animal->brinco = $request->brinco;
                $animal->lote_id = $request->lote_id;
                $animal->fornecedor_id = $request->fornecedor_id;
                $animal->ativo = $request->ativo ?? 0;
                $animal->desmame = $request->desmame ?? 0;

                //crias
                $animal->parida = $request->parida;
                $animal->num_cria = $request->num_cria;
                $animal->dt_parto = $request->dt_parto;
                $animal->reg_parto = $request->reg_parto;
                $animal->new_cria = $request->new_cria;
                $animal->brinco_cria = $request->brinco_cria;
                $animal->nome_cria = $request->nome_cria;
                $animal->sexo_cria = $request->sexo_cria;
                $animal->raca_cria = $request->raca_cria;

                $animal->save();
    
                if (isset($request->imagem)) {
                    $data = Carbon::now();
                    $path = '/arquivos/rebanhos/';
                    $arquivo = $animal->id
                        . $data->format("_Y-m-d-H-i-s")
                        . '.'
                        . $request->imagem->getClientOriginalExtension()
                    ;
                    $request->imagem->move(public_path() . $path, $arquivo);
                    $animal->imagem = "{$path}/{$arquivo}";
                    $animal->save();
                }

                $notification = array(
                    'title' => 'Parabéns!',
                    'message' => 'Animal Salvo com Sucesso',
                    'icon' => 'success',
                    'returnUrl' => url('rebanho/animais')
                );
                return view('shared.notificationWindowTop', compact('notification'));
    
                return $animal;
            } catch (Exception $ex) {
                $notification = array(
                    'title' => 'Oops!',
                    'message' => "Ocorreu um Erro ao salvar o Animal! " . htmlentities($ex->getMessage()),
                    'icon' => 'error'
                );
                return view('shared.notificationWindowTop', compact('notification'));
            }

        }else {
            $message = [];
            $errors = $validate->errors();
            foreach($errors->all() as $item ) {
                $message[] = $item;
            }

            $notification = array(
                'title' => 'Oops!',
                'message' => "Ocorreu um Erro ao salvar o Animal!<br> " . implode('<br>', $message),
                'icon' => 'error'
            );
            return view('shared.notificationWindowTop', compact('notification'));
        }    
 
    }
}