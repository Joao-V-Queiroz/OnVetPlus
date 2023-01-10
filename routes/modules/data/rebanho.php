<?php

use App\Http\Controllers\Data\Rebanho\LoteController;
use App\Http\Controllers\Data\Rebanho\AnimalController;
use App\Http\Controllers\Data\Rebanho\SemenController;
use App\Http\Controllers\Data\Rebanho\EmbriaoController;

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'lotes'], function () {
        Route::post('save', [LoteController::class, 'save']);
    });
});

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'animais'], function () {
        Route::post('save', [AnimalController::class, 'save']);
    });
});

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'semens'], function () {
        Route::post('save', [SemenController::class, 'save']);
    });
});

Route::group(['prefix' => 'rebanho'], function () {
    Route::group(['prefix' => 'embrioes'], function () {
        Route::post('save', [EmbriaoController::class, 'save']);
    });
});