<?php

use App\Http\Controllers\Cadastro\FuncionarioController;
use App\Http\Controllers\Cadastro\FornecedorController;
use App\Http\Controllers\Cadastro\TanqueController;
use App\Http\Controllers\Cadastro\AreaController;
use App\Http\Controllers\Cadastro\CulturaController;
use App\Http\Controllers\Cadastro\IatfController;
use App\Http\Controllers\Cadastro\PastagemController;

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'funcionarios'], function () {
        // listagem
        Route::any('/', [FuncionarioController::class, 'index'])
            ->name('funcionarios-index')
            ->middleware('checkPermission:4')
        ;
        // delete
        Route::get('/delete/{id}', [FuncionarioController::class, 'destroy'])
            ->name('funcionarios-destroy')
            ->middleware('checkPermission:4')   
        ;
        // create
        Route::get('/create/{id}', [FuncionarioController::class, 'create'])
            ->name('funcionarios-create')
            ->middleware('checkPermission:4')
        ;
    });

    Route::group(['prefix' => 'fornecedores'], function () {
        // listagem
        Route::any('/', [FornecedorController::class, 'index'])
            ->name('fornecedores-index')
            ->middleware('checkPermission:12')
        ;
        // delete
        Route::get('/delete/{id}', [FornecedorController::class, 'destroy'])
            ->name('fornecedores-destroy')
            ->middleware('checkPermission:12')   
        ;
        // create
        Route::get('/create/{id}', [FornecedorController::class, 'create'])
            ->name('fornecedores-create')
            ->middleware('checkPermission:12')
        ;
    });

    Route::group(['prefix' => 'tanques'], function () {
        // listagem
        Route::any('/', [TanqueController::class, 'index'])
            ->name('tanques-index')
            ->middleware('checkPermission:6')
        ;
        // delete
        Route::get('/delete/{id}', [TanqueController::class, 'destroy'])
            ->name('tanques-destroy')
            ->middleware('checkPermission:6')   
        ;
        // create
        Route::get('/create/{id}', [TanqueController::class, 'create'])
            ->name('tanques-create')
            ->middleware('checkPermission:6')
        ;
    });

    Route::group(['prefix' => 'areas'], function () {
        // listagem
        Route::any('/', [AreaController::class, 'index'])
            ->name('areas-index')
            ->middleware('checkPermission:13')
        ;
        // delete
        Route::get('/delete/{id}', [AreaController::class, 'destroy'])
            ->name('areas-destroy')
            ->middleware('checkPermission:13')   
        ;
        // create
        Route::get('/create/{id}', [AreaController::class, 'create'])
            ->name('areas-create')
            ->middleware('checkPermission:13')
        ;
    });

    Route::group(['prefix' => 'culturas'], function () {
        // listagem
        Route::any('/', [CulturaController::class, 'index'])
            ->name('culturas-index')
            ->middleware('checkPermission:15')
        ;
        // delete
        Route::get('/delete/{id}', [CulturaController::class, 'destroy'])
            ->name('culturas-destroy')
            ->middleware('checkPermission:15')   
        ;
        // create
        Route::get('/create/{id}', [CulturaController::class, 'create'])
            ->name('culturas-create')
            ->middleware('checkPermission:15')
        ;
    });

    Route::group(['prefix' => 'pastagens'], function () {
        // listagem
        Route::any('/', [PastagemController::class, 'index'])
            ->name('pastagens-index')
            ->middleware('checkPermission:14')
        ;
        // delete
        Route::get('/delete/{id}', [PastagemController::class, 'destroy'])
            ->name('pastagens-destroy')
            ->middleware('checkPermission:14')   
        ;
        // create
        Route::get('/create/{id}', [PastagemController::class, 'create'])
            ->name('pastagens-create')
            ->middleware('checkPermission:14')
        ;
    });
});
