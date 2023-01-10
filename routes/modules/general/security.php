<?php

use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\UserController;

Route::group(['prefix' => 'security'], function () {

    Route::group(['prefix' => 'role'], function() {
        Route::any('/', [RoleController::class, 'index'])
        ->middleware('checkPermission:2');

        Route::get('delete/{id}', [RoleController::class, 'destroy'])
        ->middleware('checkPermission:2');

        Route::get('create/{id}', [RoleController::class, 'create'])
        ->middleware('checkPermission:2');
    });

    Route::group(['prefix' => 'users'], function() {
        Route::any('/', [UserController::class, 'index'])
        ->middleware('checkPermission:3');

        Route::get('delete/{id}', [UserController::class, 'destroy'])
        ->middleware('checkPermission:3');

        Route::get('create/{id}', [UserController::class, 'create'])
        ->middleware('checkPermission:3');
    });
    
});
