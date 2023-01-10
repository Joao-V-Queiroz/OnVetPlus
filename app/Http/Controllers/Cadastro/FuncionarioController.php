<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Funcionario;
use Maatwebsite\Excel\Facades\Excel;

class FuncionarioController extends Controller
{ 
    protected $model = Funcionario::class;
    
    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/funcionarios", 'name' => "Funcionários"]
    ];
        
    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $funcionarios = Funcionario::filtros($request)
        ->withCount([
            'contatos as contato' => function ($query) {
                $query->where('nome',"Ale");            
            }
        ])
            ->orderBy('nome', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($funcionarios);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($funcionarios);
        }

        $funcionarios = $funcionarios->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'funcionarios');
        return view('modules/cadastro/funcionario/index', $dataView);       

    }
    private function indexPdf($funcionarios)
    {
        $funcionarios = $funcionarios->get();
        return \PDF::loadView('modules/cadastro/funcionario/indexPdf', compact('funcionarios'))
            ->setPaper('a4')
            ->download('Funcionarios.pdf')
        ;
    }

    private function indexExcel($funcionarios)
    {
        $funcionarios = $funcionarios->get();
        $view = 'modules/cadastro/funcionario/indexExcel';
        $arquivo = 'Funcionarios.xlsx';
        $dados = ['funcionarios' => $funcionarios];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $funcionario = $this->model::findOrFail($id);
            $funcionario->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('cadastros/funcionarios');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $funcionario = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'funcionario');
        return view('modules/cadastro/funcionario/create', $dataView);
    
    }
}
