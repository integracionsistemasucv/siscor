<?php

namespace Modules\Correspondencia\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Correspondencia\Services\EstatusService;
use Modules\Correspondencia\Http\Requests\EstatusRequest;

class EstatusController
{
    public function __construct(
        private EstatusService $estatusService
    ) {}

    public function getEstatus()
    {
        return $this->estatusService->getAllEstatus();
    }

    public function getEstatusById(int $id)
    {
        return $this->estatusService->getEstatusById($id);
    }

    public function createEstatus(EstatusRequest $request)
    {
        return $this->estatusService->createEstatus($request->validated());
    }

    public function updateEstatus(int $id, EstatusRequest $request)
    {
        return $this->estatusService->updateEstatus($id, $request->validated());
    }

    public function deleteEstatus(int $id)
    {
        return $this->estatusService->deleteEstatus($id);
    }
}
