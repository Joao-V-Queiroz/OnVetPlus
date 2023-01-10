<?php

namespace App\Http\Controllers\Tema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
  // Bootstrap Table
  public function table()
  {
    $breadcrumbs = [['link' => "/", 'name' => "Home"], ['name' => "Table Bootstrap"]];
    return view('/tema/content/table/table-bootstrap/table-bootstrap', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Datatable Basic
  public function datatable_basic()
  {
    $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Datatable"], ['name' => "Basic"]];
    return view('/tema/content/table/table-datatable/table-datatable-basic', ['breadcrumbs' => $breadcrumbs]);
  }

  // Datatable Basic
  public function datatable_advance()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Datatable"], ['name' => "Advanced"]
    ];
    return view('/tema/content/table/table-datatable/table-datatable-advance', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // ag-Grid Table
  public function ag_grid()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['name' => "agGrid Table"]
    ];
    return view('/tema/content/table/table-ag-grid/table-ag-grid', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }
}
