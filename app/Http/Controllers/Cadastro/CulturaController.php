<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Cultura;
use Maatwebsite\Excel\Facades\Excel;

class CulturaController extends Controller
{
    protected $model = Cultura::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/culturas", 'name' => "Culturas"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $culturas = Cultura::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($culturas);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($culturas);
        }

        $culturas = $culturas->paginate(config('app.paginate'));

        $dataView = compact('breadcrumbs', 'request', 'culturas');
        return view('modules/cadastro/cultura/index', $dataView);  
    }

    public function destroy($id)
    {
        try {
            $cultura = $this->model::findOrFail($id);
            $cultura->delete();
            session()->flash('flash_message', 'A cultura foi apagada com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover a Cultura!');
        }
        return redirect('cadastros/culturas');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $cultura = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'cultura');
        return view('modules/cadastro/cultura/create', $dataView);       
    }

    private function indexPdf($culturas)
    {
        $culturas = $culturas->get();
        return \PDF::loadView('modules/cadastro/cultura/indexPdf', compact('culturas'))
            ->setPaper('a4')
            ->download('Culturas.pdf')
        ;
    }

    private function indexExcel($culturas)
    {
        $culturas = $culturas->get();
        $view = 'modules/cadastro/cultura/indexExcel';
        $arquivo = 'Culturas.xlsx';
        $dados = ['culturas' => $culturas];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
}
