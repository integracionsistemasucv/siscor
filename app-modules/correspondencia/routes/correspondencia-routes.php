<?php

use Modules\Correspondencia\Http\Controllers\CorrespondenciaController;

// Route::get('/correspondencias', [CorrespondenciaController::class, 'index'])->name('correspondencias.index');
// Route::get('/correspondencias/create', [CorrespondenciaController::class, 'create'])->name('correspondencias.create');
// Route::post('/correspondencias', [CorrespondenciaController::class, 'store'])->name('correspondencias.store');
// Route::get('/correspondencias/{correspondencium}', [CorrespondenciaController::class, 'show'])->name('correspondencias.show');
// Route::get('/correspondencias/{correspondencium}/edit', [CorrespondenciaController::class, 'edit'])->name('correspondencias.edit');
// Route::put('/correspondencias/{correspondencium}', [CorrespondenciaController::class, 'update'])->name('correspondencias.update');
// Route::delete('/correspondencias/{correspondencium}', [CorrespondenciaController::class, 'destroy'])->name('correspondencias.destroy');

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Modules\Correspondencia\Http\Controllers\CrudTablasController;

Route::get ('/correspondencias', [CorrespondenciaController::class, 'index'])->name('correspondencia.index');


// crear un middleware para autenticar las rutas
Route::controller(CrudTablasController::class)->group(function () {
    Route::get('/tipos', 'getAllTipos')->name('correspondencia.tipos');
    Route::post('/tiposCreate', 'createTipo')->name('correspondencia.tipos.create');
    Route::put('/tiposUpdate/{id}', 'updateTipo')->name('correspondencia.tipos.update');
    Route::delete('/tiposDelete/{id}', 'deleteTipo')->name('correspondencia.tipos.delete');

    Route::get('/categorias', 'getCategorias')->name('correspondencia.categorias');
    Route::get('/estatus', 'getEstatus')->name('correspondencia.estatus');
});

Route::get('/usuarios', function () {
    return Inertia::render('Users', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});