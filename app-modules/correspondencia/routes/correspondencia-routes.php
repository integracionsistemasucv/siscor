<?php

use Modules\Correspondencia\Http\Controllers\CorrespondenciaController;
use Modules\Correspondencia\Http\Controllers\CrudTablasController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get ('/correspondencias', [CorrespondenciaController::class, 'index'])->name('correspondencia.index');

// crear un middleware para autenticar las rutas
Route::controller(CrudTablasController::class)->group(function () {
    // Rutas para TIPOS
    Route::get('/tipos', 'getTipos')->name('correspondencia.tipos');
    Route::post('/tipos/create', 'createTipo')->name('correspondencia.tipos.create');
    Route::put('/tipos/update/{id}', 'updateTipo')->name('correspondencia.tipos.update');
    Route::delete('/tipos/delete/{id}', 'deleteTipo')->name('correspondencia.tipos.delete');
    // Rutas para CATEGORIAS
    Route::get('/categorias', 'getCategorias')->name('correspondencia.categorias');
    Route::post('/categorias/create', 'createCategoria')->name('correspondencia.categorias.create');
    Route::put('/categorias/update/{id}', 'updateCategoria')->name('correspondencia.categorias.update');
    Route::delete('/categorias/delete/{id}', 'deleteCategoria')->name('correspondencia.categorias.delete');
    // Rutas para ESTATUS
    Route::get('/estatus', 'getEstatus')->name('correspondencia.estatus');
    Route::post('/estatus/create', 'createEstatus')->name('correspondencia.estatus.create');
    Route::put('/estatus/update/{id}', 'updateEstatus')->name('correspondencia.estatus.update');
    Route::delete('/estatus/delete/{id}', 'deleteEstatus')->name('correspondencia.estatus.delete');
});

Route::get('/usuarios', function () {
    return Inertia::render('Users', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});