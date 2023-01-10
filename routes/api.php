<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Dados\DashboardController as DadosDashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getAnimaisRaca', [DadosDashboardController::class, 'consultaAnimais']);
Route::get('/getAnimaisRaca/{raca}', [DadosDashboardController::class, 'consultaAnimaisRaca']);
Route::get('/getAnimaisPeso', [DadosDashboardController::class, 'consultaAnimaisPeso']);