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

    public function getAllTipos()
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
}
