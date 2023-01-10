<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Pastagem;
use Maatwebsite\Excel\Facades\Excel;

class PastagemController extends Controller
{ 
    protected $model = Pastagem::class;
    
    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/pastagens", 'name' => "Pastagens"]
    ];
        
    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $pastagens = Pastagem::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($pastagens);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($pastagens);
        }

        $pastagens = $pastagens->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'pastagens');
        return view('modules/cadastro/pastagem/index', $dataView);       

    }
    private function indexPdf($pastagens)
    {
        $pastagens = $pastagens->get();
        return \PDF::loadView('modules/cadastro/pastagem/indexPdf', compact('pastagens'))
            ->setPaper('a4')
            ->download('Pastagens.pdf')
        ;
    }

    private function indexExcel($pastagens)
    {
        $pastagens = $pastagens->get();
        $view = 'modules/cadastro/pastagem/indexExcel';
        $arquivo = 'Pastagens.xlsx';
        $dados = ['pastagens' => $pastagens];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $pastagem = $this->model::findOrFail($id);
            $pastagem->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('cadastros/pastagens');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $pastagem = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'pastagem');
        return view('modules/cadastro/pastagem/create', $dataView);
    
    }
}
