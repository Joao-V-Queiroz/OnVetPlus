<?php

namespace App\Http\Controllers\Rebanho;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Rebanho\Animal;
use App\Models\Rebanho\Lote;
use App\Models\Cadastro\Fornecedor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    protected $model = Animal::class;
    protected $breadcrumbs = [
        ['name' => "Cadastro de Animais"],
        ['link' => "/rebanho/animais", 'name' => "Animais"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $animais = Animal::filtros($request)
            ->orderBy('nome', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($animais);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($animais);
        }

        $animais = $animais
        ->with('lote:id,nome')
        ->with('fornecedor:id,nome')
        ->paginate(config('app.paginate'));

        $resume = $this->model::filtros($request)
        ->select(
            DB::raw('SUM(IF(ativo = 1, 1 ,0)) as ativos'),
            DB::raw('SUM(IF(ativo = 0, 1 ,0)) as inativos')
        )
        ->where('id', '>', 1)
        ->first()
    ;


        $dataView = compact('breadcrumbs', 'request', 'animais', 'resume');
        return view('modules/rebanho/animal/index', $dataView);
    }

    private function indexPdf($animais)
    {
        $animais = $animais->get();
        return \PDF::loadView('modules/rebanho/animal/indexPdf', compact('animais'))
            ->setPaper('a4')
            ->download('Animais.pdf')
        ;
    }

    private function indexExcel($animais)
    {
        $animais = $animais->get();
        $view = 'modules/rebanho/animal/indexExcel';
        $arquivo = 'Animais.xlsx';
        $dados = ['animais' => $animais];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }
    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $lotes = Lote::select('id', 'nome')->orderBy('nome')->get();
        $fornecedores = Fornecedor::select('id', 'nome')->orderBy('nome')->get();
        $animal = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'animal', 'lotes', 'fornecedores');
        return view('modules/rebanho/animal/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $animal = $this->model::findOrFail($id);
            $animal->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('rebanho/animais');
    }

    public function show($id)
    {
        $breadcrumbs = $this->breadcrumbs;        
        $animal = $this->model::findOrFail($id);
        $viewData = compact('breadcrumbs', 'animal');
        return view('modules/rebanho/animais/show', $viewData);
    }
}
