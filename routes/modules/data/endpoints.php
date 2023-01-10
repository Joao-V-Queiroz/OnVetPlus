<?php

use App\Http\Controllers\Data\ExemploController;

Route::group(['prefix' => 'data'], function () {
    Route::get('exemplo', [ExemploController::class, 'index'])->name('exemplo');
    Route::get('exemplo/{id}', [ExemploController::class, 'show'])->name('exemplo-show');
    Route::post('exemplo/save', [ExemploController::class, 'save'])->name('exemplo-save');
    Route::post('exemplo/delete', [ExemploController::class, 'destroy'])->name('exemplo-delete');

    include('security.php');
    include('cadastro.php');
    include('duvida.php');
    include('rebanho.php');
    include('protocolo.php');
});
