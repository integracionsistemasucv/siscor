<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\Serie;
use Modules\Radicacion\Repositories\Contracts\SerieRepositoryInterface;

class EloquentSerieRepository implements SerieRepositoryInterface
{
    protected $model;

    public function __construct(Serie $model)
    {
        $this->model = $model;
    }

    public function getByDependencia(string $dependenciaId)
    {
        return $this->model->where('dependencia_id', $dependenciaId)->get();
    }

    public function finWithSubseries(int $id)
    {
        return $this->model->with('subSeries')->findOrFail($id);
    }
}