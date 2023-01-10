<?php

namespace App\Http\Controllers\Protocolo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Protocolo\Iatf;
use App\Models\Rebanho\Animal;
use Maatwebsite\Excel\Facades\Excel;


class IatfController extends Controller
{
    protected $model = Iatf::class;

    protected $breadcrumbs = [
        ['name' => "Protocolos"],
        ['link' => "/protocolos/iatfs", 'name' => "Cadastrar protocolo IATF"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $iatfs = Iatf::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($iatfs);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($iatfs);
        }

        $iatfs = $iatfs->with('animal:id,nome','animais:id,nome')->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'iatfs');
        return view('modules/protocolo/iatf/index', $dataView);  
    }

    private function indexPdf($iatfs)
    {
        $iatfs = $iatfs->get();
        return \PDF::loadView('modules/protocolo/iatf/indexPdf', compact('iatfs'))
            ->setPaper('a4')
            ->download('iatfs.pdf')
        ;
    }

    private function indexExcel($iatfs)
    {
        $iatfs = $iatfs->get();
        $view = 'modules/protocolo/iatf/indexExcel';
        $arquivo = 'iatfs.xlsx';
        $dados = ['iatfs' => $iatfs];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $iatf = $this->model::findOrFail($id);
            $iatf->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('protocolos/iatfs');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $iatf = $this->model::findOrNew($id);
        $animais = Animal::select('id', 'nome')->where('sexo', '=', 'MACHO')->orderBy('nome')->get();
        $animais2 = Animal::select('id', 'nome')->where('sexo', '=', 'FEMEA')->orderBy('nome')->get();
        $dataView = compact('breadcrumbs', 'iatf','animais','animais2');
        return view('modules/protocolo/iatf/create', $dataView);       
    }
}
