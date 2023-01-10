<?php

use App\Http\Controllers\Data\Duvida\FaqController;

Route::group(['prefix' => 'duvida'], function () {
    Route::group(['prefix' => 'faqs'], function () {
        Route::post('save', [FaqController::class, 'save']);
    });
});
