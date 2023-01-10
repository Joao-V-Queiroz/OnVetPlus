<?php

use App\Http\Controllers\Data\Security\AuditLogController;
use App\Http\Controllers\Data\Security\RoleController;
use App\Http\Controllers\Data\Security\UserController;

Route::group(['prefix' => 'security'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('{id}/audits', [AuditLogController::class, 'index']);
        Route::post('/save', [UserController::class, 'save']);
    });

    Route::group(['prefix' => 'role'], function () {
        Route::post('/save', [RoleController::class, 'save']);
    });
});
