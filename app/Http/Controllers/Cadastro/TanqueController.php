<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Tanque;
use Maatwebsite\Excel\Facades\Excel;

class TanqueController extends Controller
{
    protected $model = Tanque::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/tanques", 'name' => "Tanques"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $tanques = Tanque::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($tanques);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($tanques);
        }

        $tanques = $tanques->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'tanques');
        return view('modules/cadastro/tanque/index', $dataView);  
    }

    public function destroy($id)
    {
        try {
            $tanque = $this->model::findOrFail($id);
            $tanque->delete();
            session()->flash('flash_message', 'O tanque foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o tanque!');
        }
        return redirect('cadastros/tanques');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $tanque = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'tanque');
        return view('modules/cadastro/tanque/create', $dataView);       
    }

    private function indexPdf($tanques)
    {
        $tanques = $tanques->get();
        return \PDF::loadView('modules/cadastro/tanque/indexPdf', compact('tanques'))
            ->setPaper('a4')
            ->download('Tanques.pdf')
        ;
    }

    private function indexExcel($tanques)
    {
        $tanques = $tanques->get();
        $view = 'modules/cadastro/tanque/indexExcel';
        $arquivo = 'Tanques.xlsx';
        $dados = ['tanques' => $tanques];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
}
