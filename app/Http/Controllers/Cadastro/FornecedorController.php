<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Fornecedor;
use Maatwebsite\Excel\Facades\Excel;

class FornecedorController extends Controller
{ 
    protected $model = Fornecedor::class;
    
    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/fornecedores", 'name' => "Fornecedores"]
    ];
        
    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $fornecedores = Fornecedor::filtros($request)
        ->withCount([
            'contatos as contato' => function ($query) {
                $query->where('nome',"Ale");            
            }
        ])
            ->orderBy('nome', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($fornecedores);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($fornecedores);
        }

        $fornecedores = $fornecedores->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'fornecedores');
        return view('modules/cadastro/fornecedor/index', $dataView);       

    }
    private function indexPdf($fornecedores)
    {
        $fornecedores = $fornecedores->get();
        return \PDF::loadView('modules/cadastro/fornecedor/indexPdf', compact('fornecedores'))
            ->setPaper('a4')
            ->download('Fornecedores.pdf')
        ;
    }

    private function indexExcel($fornecedores)
    {
        $fornecedores = $fornecedores->get();
        $view = 'modules/cadastro/fornecedor/indexExcel';
        $arquivo = 'Fornecedores.xlsx';
        $dados = ['fornecedores' => $fornecedores];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $fornecedor = $this->model::findOrFail($id);
            $fornecedor->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('cadastros/fornecedores');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $fornecedor = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'fornecedor');
        return view('modules/cadastro/fornecedor/create', $dataView);
    
    }
}
