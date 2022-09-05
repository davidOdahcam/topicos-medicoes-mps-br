<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::post('registrar', [RegisteredUserController::class, 'store'])->name('auth.register');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('auth.login.index');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('auth.login');
    Route::get('esqueci-minha-senha', [PasswordResetLinkController::class, 'create'])->name('auth.password.request');
    Route::post('esqueci-minha-senha', [PasswordResetLinkController::class, 'store'])->name('auth.password.email');
    Route::get('resetar-senha/{token}', [NewPasswordController::class, 'create'])->name('auth.password.reset');
    Route::post('resetar-senha', [NewPasswordController::class, 'store'])->name('auth.password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verificar-email', [EmailVerificationPromptController::class, '__invoke'])->name('auth.verification.notice');
    Route::get('verificar-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('auth.verification.verify');
    Route::post('email/notificacao-de-verificacao', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('auth.verification.send');
    Route::get('confirmar-senha', [ConfirmablePasswordController::class, 'show'])->name('auth.password.confirm');
    Route::post('confirmar-senha', [ConfirmablePasswordController::class, 'store'])->name('auth.password.confirm.post');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');
});
