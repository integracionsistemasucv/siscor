<?php

use Illuminate\Support\Facades\Route;
use Modules\Radicacion\Http\Controllers\RadicadoController;

Route::middleware(['web', 'auth:sanctum', config('jetstream.auth_session')])->group(function () {

    Route::prefix('radicacion')->name('radicacion.')->group(function () {
        Route::get('/bandeja', [RadicadoController::class, 'index'])->name('index');
        Route::get('/nuevo', [RadicadoController::class, 'create'])->name('create');
        Route::post('/guardar', [RadicadoController::class, 'store'])->name('store'); 
    });
});