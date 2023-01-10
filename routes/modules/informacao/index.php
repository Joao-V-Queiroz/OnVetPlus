<?php

use App\Http\Controllers\Informacao\DashboardController;

Route::group(['prefix' => 'informacao'], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::any('/', [DashboardController::class, 'index'])
            ->name('dashboard-index')
            ->middleware('checkPermission:23')
        ;
    });
});