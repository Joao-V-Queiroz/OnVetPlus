<?php

use App\Http\Controllers\Data\Protocolo\InducaoController;
use App\Http\Controllers\Data\Protocolo\TeController;
use App\Http\Controllers\Data\Protocolo\IatfController;

Route::group(['prefix' => 'protocolos'], function () {
    Route::group(['prefix' => 'inducoes'], function () {
        Route::post('save', [InducaoController::class, 'save']);
    });
});
Route::group(['prefix' => 'protocolos'], function () {
    Route::group(['prefix' => 'tes'], function () {
        Route::post('save', [TeController::class, 'save']);
    });
});
Route::group(['prefix' => 'protocolos'], function () {
    Route::group(['prefix' => 'iatfs'], function () {
        Route::post('save', [IatfController::class, 'save']);
    });
});