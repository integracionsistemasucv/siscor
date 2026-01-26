<?php

use Modules\Usuarios\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:sanctum', config('jetstream.auth_session')])->group(function () {

    Route::get('/usuarios', [UsuariosController::class, 'index'])
        ->name('usuarios.index');

    Route::get('/perfil', [UsuariosController::class, 'profile'])
        ->name('usuarios.profile');
});

// Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
// Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
// Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
// Route::get('/usuarios/{usuario}', [UsuariosController::class, 'show'])->name('usuarios.show');
// Route::get('/usuarios/{usuario}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
// Route::put('/usuarios/{usuario}', [UsuariosController::class, 'update'])->name('usuarios.update');
// Route::delete('/usuarios/{usuario}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
