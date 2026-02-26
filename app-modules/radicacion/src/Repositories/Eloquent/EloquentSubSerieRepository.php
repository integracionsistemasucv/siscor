<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\SubSerie;
use Modules\Radicacion\Repositories\Contracts\SubSerieRepositoryInterface;

class EloquentSubSerieRepository implements SubSerieRepositoryInterface
{
    protected $model;

    public function __construct(SubSerie $model)
    {
        $this->model = $model;
    }

    public function getBySerie(int $serieId)
    {
        return $this->model->where('serie_id', $serieId)->get();
    }
}