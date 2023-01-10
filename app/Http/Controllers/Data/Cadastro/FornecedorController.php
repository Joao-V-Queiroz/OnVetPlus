<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Fornecedor;
use App\Models\Cadastro\FornecedorContato;
use Illuminate\Http\Request;

use Exception;

class FornecedorController extends Controller
{
    protected $model = Fornecedor::class;
    public function save(Request $request)
    {
        try {
            $fornecedor = $this->model::findOrNew($request->id);
            $fornecedor->nome = $request->nome;
            $fornecedor->razao = $request->razao;
            $fornecedor->cpf = $request->cpf;
            $fornecedor->cnpj = $request->cnpj;
            $fornecedor->tipo = $request->tipo;
            $fornecedor->email = $request->email;
            $fornecedor->telefone = $request->telefone;
            $fornecedor->cep = $request->cep;
            $fornecedor->endereco = $request->endereco;
            $fornecedor->numero = $request->numero;
            $fornecedor->complemento = $request->complemento;
            $fornecedor->bairro = $request->bairro;
            $fornecedor->cidade = $request->cidade;
            $fornecedor->uf = $request->uf;
            $fornecedor->ativo = $request->ativo ?? 0;
            
                 
            $fornecedor->save();
            
            $fornecedor->contatos()->delete();
            if (isset($request->contatos)) {
                foreach ($request->contatos as $contato) {
                    if ($contato['contato_nome'] != "" || $contato['contato_telefone'] != "" || $contato['contato_email'] != "") {
                        $item = new FornecedorContato();
                        $item->fornecedor_id = $fornecedor->id;
                        $item->nome = $contato['contato_nome'];
                        $item->telefone = $contato['contato_telefone'];
                        $item->email = $contato['contato_email'];
                        $item->save();
                    }
                }
            }
            return $fornecedor;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Fornecedor !',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
