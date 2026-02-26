<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\Historico;
use Modules\Radicacion\Repositories\Contracts\HistoricoRepositoryInterface;

class EloquentHistoricoRepository implements HistoricoRepositoryInterface
{
    public function __construct(protected Historico $model){}

    public function logEvent(array $data)
    {
        return $this->model->create($data);
    }

    public function getByRadicado(int $radicadoId)
    {
        return $this->model->where('radicado_id', $radicadoId)->orderBy('created_at', 'desc')->get();
    }
}   