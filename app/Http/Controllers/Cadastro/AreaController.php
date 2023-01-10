<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Cadastro\Area;
use Maatwebsite\Excel\Facades\Excel;

class AreaController extends Controller
{
    protected $model = Area::class;

    protected $breadcrumbs = [
        ['name' => "Cadastros"],
        ['link' => "/cadastros/areas", 'name' => "Áreas"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $areas = Area::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($areas);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($areas);
        }

        $areas = $areas->paginate(config('app.paginate'));

        $dataView = compact('breadcrumbs', 'request', 'areas');
        return view('modules/cadastro/area/index', $dataView);  
    }

    public function destroy($id)
    {
        try {
            $area = $this->model::findOrFail($id);
            $area->delete();
            session()->flash('flash_message', 'A área foi apagada com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover a Área!');
        }
        return redirect('cadastros/areas');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $area = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'area');
        return view('modules/cadastro/area/create', $dataView);       
    }
    private function indexPdf($areas)
    {
        $areas = $areas->get();
        return \PDF::loadView('modules/cadastro/area/indexPdf', compact('areas'))
            ->setPaper('a4')
            ->download('Areas.pdf')
        ;
    }

    private function indexExcel($areas)
    {
        $areas = $areas->get();
        $view = 'modules/cadastro/area/indexExcel';
        $arquivo = 'Areas.xlsx';
        $dados = ['areas' => $areas];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
}
