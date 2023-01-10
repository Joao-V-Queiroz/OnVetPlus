<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/loginOnvet', function () { return redirect('dashboard');})->name('home');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::any('primeiro-acesso/{id}', [LoginController::class, 'primeiroAcesso'])->name('primeiroAcesso');
Route::post('redefinir-senha', [LoginController::class, 'redefinirSenha'])->name('redefinirSenha');
Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'submit']);


Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return redirect('security/role');
    });
    // Route::get('exemplo', function () {
    //     return redirect('security/role');
    // });

    include('modules/general/security.php');
    include('modules/cadastro/index.php');
    include('modules/tema.php');
    include('modules/duvida/index.php');
    include('modules/rebanho/index.php');
    include('modules/informacao/index.php');
    include('modules/protocolo/index.php');
    include('modules/data/endpoints.php');
});

//require __DIR__.'/auth.php';