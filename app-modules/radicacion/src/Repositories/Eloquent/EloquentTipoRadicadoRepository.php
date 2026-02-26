<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\TipoRadicado;
use Modules\Radicacion\Repositories\Contracts\TipoRadicadoRepositoryInterface;

class EloquentTipoRadicadoRepository implements TipoRadicadoRepositoryInterface
{
    public function __construct(protected TipoRadicado $model){}

    public function allActive()
    {
        return $this->model->all();
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }
}