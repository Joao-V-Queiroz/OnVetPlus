<?php

namespace App\Http\Controllers\Tema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiscellaneousController extends Controller
{
  // Coming Soon
  public function coming_soon()
  {
    $pageConfigs = ['blankPage' => true];

    return view('/tema/content/miscellaneous/page-coming-soon', ['pageConfigs' => $pageConfigs]);
  }

  // Error
  public function error()
  {
    $pageConfigs = ['blankPage' => true];

    return view('/tema/content/miscellaneous/error', ['pageConfigs' => $pageConfigs]);
  }

  // Not-authorized
  public function not_authorized()
  {
    $pageConfigs = ['blankPage' => true];

    return view('/tema/content/miscellaneous/page-not-authorized', ['pageConfigs' => $pageConfigs]);
  }

  // Maintenance
  public function maintenance()
  {
    $pageConfigs = ['blankPage' => true];

    return view('/tema/content/miscellaneous/page-maintenance', [
      'pageConfigs' => $pageConfigs
    ]);
  }
}
