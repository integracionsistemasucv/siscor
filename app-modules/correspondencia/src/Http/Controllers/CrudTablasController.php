<?php

namespace Modules\Correspondencia\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Correspondencia\Services\TiposService;
use Modules\Correspondencia\Services\CategoriasService;
use Modules\Correspondencia\Services\EstatusService;

class CrudTablasController
{
    public function __construct(
        private TiposService $tiposService,
        private CategoriasService $categoriasService,
        private EstatusService $estatusService
    ) {}

// Métodos para manejar las operaciones CRUD utilizando los servicios

    // ------ TIPOS ------

    public function getTipos()
    {
        return $this->tiposService->getAllTipos();
    }

    public function getTipoById(int $id)
    {
        return $this->tiposService->getTipoById($id);
    }

    public function createTipo(Request $request)
    {
        $data = $request->all();
        return $this->tiposService->createTipo($data);
    }

    public function updateTipo(int $id, Request $request)
    {
        $data = $request->all();
        return $this->tiposService->updateTipo($id, $data);
    }

    public function deleteTipo(int $id)
    {
        return $this->tiposService->deleteTipo($id);
    }

    // ------ CATEGORIAS ------

    public function getCategorias()
    {
        return $this->categoriasService->getAllCategorias();
    }

    public function getCategoriaById(int $id)
    {
        return $this->categoriasService->getCategoriaById($id);
    }

    public function createCategoria(Request $request)
    {
        $data = $request->all();
        return $this->categoriasService->createCategoria($data);
    }

    public function updateCategoria(int $id, Request $request)
    {
        $data = $request->all();
        return $this->categoriasService->updateCategoria($id, $data);
    }

    public function deleteCategoria(int $id)
    {
        return $this->categoriasService->deleteCategoria($id);
    }

    // ------ ESTATUS ------

    public function getEstatus()
    {
        return $this->estatusService->getAllEstatus();
    }

    public function getEstatusById(int $id)
    {
        return $this->estatusService->getEstatusById($id);
    }

    public function createEstatus(Request $request)
    {
        $data = $request->all();
        return $this->estatusService->createEstatus($data);
    }

    public function updateEstatus(int $id, Request $request)
    {
        $data = $request->all();
        return $this->estatusService->updateEstatus($id, $data);
    }

    public function deleteEstatus(int $id)
    {
        return $this->estatusService->deleteEstatus($id);
    }
}
