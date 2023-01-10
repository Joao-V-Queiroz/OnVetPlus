<?php

use App\Http\Controllers\Data\Cadastro\FuncionarioController;
use App\Http\Controllers\Data\Cadastro\FornecedorController;
use App\Http\Controllers\Data\Cadastro\TanqueController;
use App\Http\Controllers\Data\Cadastro\AreaController;
use App\Http\Controllers\Data\Cadastro\CulturaController;
use App\Http\Controllers\Data\Cadastro\IatfController;
use App\Http\Controllers\Data\Cadastro\PastagemController;

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'funcionarios'], function () {
        Route::post('save', [FuncionarioController::class, 'save']);
    });
});

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'fornecedores'], function () {
        Route::post('save', [FornecedorController::class, 'save']);
    });
});

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'tanques'], function () {
        Route::post('save', [TanqueController::class, 'save']);
    });
});

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'areas'], function () {
        Route::post('save', [AreaController::class, 'save']);
    });
});

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'culturas'], function () {
        Route::post('save', [CulturaController::class, 'save']);
    });
});

Route::group(['prefix' => 'cadastros'], function () {
    Route::group(['prefix' => 'pastagens'], function () {
        Route::post('save', [PastagemController::class, 'save']);
    });
});


