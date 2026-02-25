<?php

namespace Modules\Radicacion\Repositories\Eloquent;

use Modules\Radicacion\Models\Radicado;
use Modules\Radicacion\Repositories\Contracts\RadicadoRepositoryInterface;

class EloquentRadicadoRepository implements RadicadoRepositoryInterface
{
    public function __construct(protected Radicado $model){}

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findByNumero(string $numeroRadicado)
    {
        return $this->model->where('numero_radicado', $numeroRadicado)->first();
    }

    public function getByUserActual(int $userId, int $perPage = 15)
    {
        return $this->model->where('usuario_actual_id', $userId)
        ->with(['tipoRadicado'])
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
    }

    public function updateActualUser(int $radicadoId, int $newUserId)
    {
        $radicado = $this->model->findOrFail($radicadoId);
        $radicado->update(['usuario_actual_id' => $newUserId]);
        return $radicado;
    }

    public function getWithHistoricos(int $radicadoId)
    {
        return $this->model->with(['historicos.usuarioOrigen', 'historicos.usuarioDestino'])->findOrFail($radicadoId);
    }
}