<?php

use App\Http\Controllers\Protocolo\InducaoController;
use App\Http\Controllers\Protocolo\TeController;
use App\Http\Controllers\Protocolo\IatfController;

Route::group(['prefix' => 'protocolos'], function () {
    Route::group(['prefix' => 'inducoes'], function () {
        Route::any('/', [InducaoController::class, 'index'])
            ->name('inducoes-index')
            ->middleware('checkPermission:8')
        ;
        Route::get('/delete/{id}', [InducaoController::class, 'destroy'])
            ->name('inducoes-destroy')
            ->middleware('checkPermission:8')
        ;
        Route::get('/create/{id}', [InducaoController::class, 'create'])
            ->name('inducoes-create')
            ->middleware('checkPermission:8')
        ;
    });

    Route::group(['prefix' => 'tes'], function () {
        // listagem
        Route::any('/', [TeController::class, 'index'])
            ->name('tes-index')
            ->middleware('checkPermission:10')
        ;
        // delete
        Route::get('/delete/{id}', [TeController::class, 'destroy'])
            ->name('tes-destroy')
            ->middleware('checkPermission:10')   
        ;
        // create
        Route::get('/create/{id}', [TeController::class, 'create'])
            ->name('tes-create')
            ->middleware('checkPermission:10')
        ;
    });

    Route::group(['prefix' => 'iatfs'], function () {
        // listagem
        Route::any('/', [IatfController::class, 'index'])
            ->name('iatfs-index')
            ->middleware('checkPermission:11')
        ;
        // delete
        Route::get('/delete/{id}', [IatfController::class, 'destroy'])
            ->name('iatfs-destroy')
            ->middleware('checkPermission:11')   
        ;
        // create
        Route::get('/create/{id}', [IatfController::class, 'create'])
            ->name('iatfs-create')
            ->middleware('checkPermission:11')
        ;
    });
    
});

