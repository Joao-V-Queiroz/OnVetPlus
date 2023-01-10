<?php

namespace App\Http\Controllers\Duvida;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Models\Duvida\Faq;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FaqController extends Controller
{
    protected $model = Faq::class;
    protected $breadcrumbs = [
        ['name' => "Dúvidas Gerais"],
        ['link' => "/duvida/faqs", 'name' => "FAQs"]
    ];

    public function index(Request $request)
    {
        $breadcrumbs = $this->breadcrumbs;
        $faqs = Faq::filtros($request)
            ->orderBy('pergunta', 'ASC')
        ;

        if (isset($request->export) && $request->export == 'PDF') {
            return $this->indexPdf($faqs);
        }

        if (isset($request->export) && $request->export == 'XLS') {
            return $this->indexExcel($faqs);
        }

        $faqs = $faqs->paginate(config('app.paginate'));


        $dataView = compact('breadcrumbs', 'request', 'faqs');
        return view('modules/duvida/faq/index', $dataView);
    }

    private function indexPdf($faqs)
    {
        $faqs = $faqs->get();
        return \PDF::loadView('modules/duvida/faq/indexPdf', compact('faqs'))
            ->setPaper('a4')
            ->download('FAQs.pdf')
        ;
    }

    private function indexExcel($faqs)
    {
        $faqs = $faqs->get();
        $view = 'modules/duvida/faq/indexExcel';
        $arquivo = 'FAQs.xlsx';
        $dados = ['faqs' => $faqs];

        return Excel::download(new ExcelExport($view, $dados), $arquivo);
    }

    public function create($id)
    {
        $breadcrumbs = $this->breadcrumbs;
        $faq = $this->model::findOrNew($id);
        $dataView = compact('breadcrumbs', 'faq');
        return view('modules/duvida/faq/create', $dataView);
    }

    public function destroy($id)
    {
        try {
            $faq = $this->model::findOrFail($id);
            $faq->delete();
            session()->flash('flash_message', 'Apagado com Sucesso!');
        } catch (\Exception $ex) {
            session()->flash('error_message', 'Erro ao Remover!');
        }
        return redirect('duvida/faqs');
    }
}
