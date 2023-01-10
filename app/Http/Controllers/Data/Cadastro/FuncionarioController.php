<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Funcionario;
use App\Models\Cadastro\FuncionarioContato;
use Illuminate\Http\Request;

use Exception;

class FuncionarioController extends Controller
{
    protected $model = Funcionario::class;
    public function save(Request $request)
    {
        try {
            $funcionario = $this->model::findOrNew($request->id);
            $funcionario->nome = $request->nome;
            $funcionario->sexo = $request->sexo;
            $funcionario->funcao = $request->funcao;
            $funcionario->cpf = $request->cpf;
            $funcionario->dt_nasc = $request->dt_nasc;
            $funcionario->telefone = $request->telefone;
            $funcionario->cep = $request->cep;
            $funcionario->endereco = $request->endereco;
            $funcionario->numero = $request->numero;
            $funcionario->complemento = $request->complemento;
            $funcionario->bairro = $request->bairro;
            $funcionario->cidade = $request->cidade;
            $funcionario->uf = $request->uf;
            $funcionario->ativo = $request->ativo ?? 0;
            
                 
            $funcionario->save();
            
            $funcionario->contatos()->delete();
            if (isset($request->contatos)) {
                foreach ($request->contatos as $contato) {
                    if ($contato['contato_nome'] != "" || $contato['contato_telefone'] != "" || $contato['contato_email'] != "") {
                        $item = new FuncionarioContato();
                        $item->funcionario_id = $funcionario->id;
                        $item->nome = $contato['contato_nome'];
                        $item->telefone = $contato['contato_telefone'];
                        $item->email = $contato['contato_email'];
                        $item->save();
                    }
                }
            }
            return $funcionario;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Funcionário !',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
