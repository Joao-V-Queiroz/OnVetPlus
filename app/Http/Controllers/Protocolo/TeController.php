<?php

namespace App\Http\Controllers\Protocolo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use App\Models\Protocolo\Te;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Rebanho\Animal;

class TeController extends Controller
{
    protected $model = Te::class;

    protected $breadcrumbs = [
        ['name' => "Protocolos"],
        ['link' => "/protocolos/tes", 'name' => "Cadastrar protocolo TE"]
    ];

    public function index(Request $request)
    {
       
        $breadcrumbs = $this->breadcrumbs;
        $tes = Te::filtros($request)        
            ->orderBy('id', 'DESC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($tes);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($tes);
        }

        $tes = $tes->with('animal:id,nome','animais:id,nome')->paginate(config('app.paginate'));

        //caminho para salvar o objeto no banco
        //errar aqui, gera um 404 !
        $dataView = compact('breadcrumbs', 'request', 'tes');
        return view('modules/protocolo/te/index', $dataView);  
    }

    private function indexPdf($tes)
    {
        $tes = $tes->get();
        return \PDF::loadView('modules/protocolo/te/indexPdf', compact('tes'))
            ->setPaper('a4')
            ->download('Tes.pdf')
        ;
    }

    private function indexExcel($tes)
    {
        $tes = $tes->get();
        $view = 'modules/protocolo/te/indexExcel';
        $arquivo = 'tes.xlsx';
        $dados = ['tes' => $tes];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function destroy($id)
    {
        try {
            $te = $this->model::findOrFail($id);
            $te->delete();
            session()->flash('flash_message', 'O protocolo foi apagado com sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover o protocolo!');
        }
        return redirect('protocolos/tes');
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $te = $this->model::findOrNew($id);
        $animais = Animal::select('id', 'nome')->where('sexo', '=', 'MACHO')->orderBy('nome')->get();
        $animais2 = Animal::select('id', 'nome')->where('sexo', '=', 'FEMEA')->orderBy('nome')->get();
        $dataView = compact('breadcrumbs', 'te','animais','animais2');
        return view('modules/protocolo/te/create', $dataView);       
    }
}
