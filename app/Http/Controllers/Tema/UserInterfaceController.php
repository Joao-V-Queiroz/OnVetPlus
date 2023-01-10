<?php

namespace App\Http\Controllers\Tema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInterfaceController extends Controller
{
  // Content Typography
  public function typography()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "UI"], ['name' => "Typography"]
    ];
    return view('/tema/content/ui-pages/ui-typography', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // UI Elements - Colors
  public function colors()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"],  ['link' => "javascript:void(0)", 'name' => "UI"], ['name' => "Colors"]
    ];
    return view('/tema/content/ui-pages/ui-colors', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Icons Feather
  public function icons_feather()
  {
    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "UI"], ['name' => "Feather Icons"]
    ];
    return view('/tema/content/ui-pages/icons-feather', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }
}
