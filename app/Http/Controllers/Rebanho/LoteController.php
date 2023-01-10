<?php

namespace App\Http\Controllers\Rebanho;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Lote;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LoteController extends Controller
{
    protected $model = Lote::class;
    protected $breadcrumbs = [
        ['name' => "Cadastro de Lotes"],
        ['link' => "/rebanho/lotes", 'name' => "Lotes"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $lotes = Lote::filtros($request)
            ->orderBy('nome', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($lotes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($lotes);
        }

        $lotes = $lotes->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'lotes');
        return view('modules/rebanho/lote/index', $dataView);
    }

    private function indexPdf($lotes)
    {
        $lotes = $lotes->get();
        return \PDF::loadView('modules/rebanho/lote/indexPdf', compact('lotes'))
            ->setPaper('a4')
            ->download('Lotes.pdf')
        ;
    }

    private function indexExcel($lotes)
    {
        $lotes = $lotes->get();
        $view = 'modules/rebanho/lote/indexExcel';
        $arquivo = 'Lotes.xlsx';
        $dados = ['lotes' => $lotes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $lote = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'lote');
        return view('modules/rebanho/lote/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $lote = $this->model::findOrFail($id);
            $lote->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('rebanho/lotes');
    }
}