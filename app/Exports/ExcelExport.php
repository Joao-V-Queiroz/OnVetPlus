<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class ExcelExport implements WithEvents, FromView
{
    private $dados;
    
    public function __construct($view, $dados)
    {
        $this->view = $view;
        $this->dados = $dados;
    }
    
    public function view(): View
    {
        return view($this->view, $this->dados);
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A2:AK200';
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setWrapText(true);
            }
        ];
    }
}
