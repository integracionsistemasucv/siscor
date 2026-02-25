<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\Consecutivo;
use Modules\Radicacion\Repositories\Contracts\ConsecutivoRepositoryInterface;

class EloquentConsecutivoRepository implements ConsecutivoRepositoryInterface
{
    public function __construct(protected Consecutivo $model){}

    public function getAndLock(int $tipoRadicadoId, int $anio)
    {
        // lockForUpdate() previene que otros procesos lean esta fila hasta que termine la transacción
        return $this->model
            ->where('tipo_radicado_id', $tipoRadicadoId)
            ->where('anio', $anio)
            ->lockForUpdate()
            ->first();
    }

    public function incrementValue(int $consecutivoId)
    {
        return $this->model->where('id', $consecutivoId)->increment('ultimo_valor');
    }
}