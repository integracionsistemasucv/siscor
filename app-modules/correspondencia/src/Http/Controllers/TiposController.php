<?php

namespace Modules\Correspondencia\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Correspondencia\Services\TiposService;
use Modules\Correspondencia\Http\Requests\TipoRequest;


class TiposController
{
    public function __construct(
        private TiposService $tiposService
    ) {}

    public function getTipos()
    {
        return $this->tiposService->getAllTipos();
    }

    public function getTipoById(int $id)
    {
        return $this->tiposService->getTipoById($id);
    }

    public function createTipo(TipoRequest $request)
    {
        return $this->tiposService->createTipo($request->validated());
    }

    public function updateTipo(int $id, TipoRequest $request)
    {
        return $this->tiposService->updateTipo($id, $request->validated());
    }

    public function deleteTipo(int $id)
    {
        return $this->tiposService->deleteTipo($id);
    }
}
