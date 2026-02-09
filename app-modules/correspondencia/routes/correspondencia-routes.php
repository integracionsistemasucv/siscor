<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use Modules\Correspondencia\Http\Controllers\CorrespondenciaController;
use Modules\Correspondencia\Http\Controllers\TiposController;
use Modules\Correspondencia\Http\Controllers\CategoriasController;
use Modules\Correspondencia\Http\Controllers\EstatusController;

Route::middleware(['web', 'auth:sanctum', config('jetstream.auth_session')])->group(function () {

    Route::get('/inicio', [CorrespondenciaController::class, 'index'])
        ->name('inicio.index');
    Route::get('/bandeja-entrada', [CorrespondenciaController::class, 'inbox'])
        ->name('bandeja-entrada.index');
    Route::get('/enviadas', [CorrespondenciaController::class, 'sent'])
        ->name('enviadas.index');
    Route::get('/pendientes', [CorrespondenciaController::class, 'pending'])
        ->name('pendientes.index');


    // Route::get('/usuarios', function () {
    //     return Inertia::render('Users', []);
    // })->name('usuarios.index');
});

// crear un middleware para autenticar las rutas
Route::controller(TiposController::class)->group(function () {
    Route::get('/tipos', 'getTipos')->name('correspondencia.tipos');
    Route::post('/tipos/create', 'createTipo')->name('correspondencia.tipos.create');
    Route::put('/tipos/update/{id}', 'updateTipo')->name('correspondencia.tipos.update');
    Route::delete('/tipos/delete/{id}', 'deleteTipo')->name('correspondencia.tipos.delete');
});

Route::controller(CategoriasController::class)->group(function () {
    Route::get('/categorias', 'getCategorias')->name('correspondencia.categorias');
    Route::post('/categorias/create', 'createCategoria')->name('correspondencia.categorias.create');
    Route::put('/categorias/update/{id}', 'updateCategoria')->name('correspondencia.categorias.update');
    Route::delete('/categorias/delete/{id}', 'deleteCategoria')->name('correspondencia.categorias.delete');
});

Route::controller(EstatusController::class)->group(function () {
    Route::get('/estatus', 'getEstatus')->name('correspondencia.estatus');
    Route::post('/estatus/create', 'createEstatus')->name('correspondencia.estatus.create');
    Route::put('/estatus/update/{id}', 'updateEstatus')->name('correspondencia.estatus.update');
    Route::delete('/estatus/delete/{id}', 'deleteEstatus')->name('correspondencia.estatus.delete');
});
