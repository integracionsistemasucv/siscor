<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\TipoDocumental;
use Modules\Radicacion\Repositories\Contracts\TipoDocumentalRepositoryInterface;

class EloquentTipoDocumentalRepository implements TipoDocumentalRepositoryInterface
{
    protected $model;

    public function __construct(TipoDocumental $model)
    {
        $this->model = $model;
    }

    public function getBySubSerie(int $subSerieId)
    {
        return $this->model->where('subserie_id', $subSerieId)->get();
    }
}