<?php

namespace Modules\Correspondencia\Repositories\Eloquent;

use Modules\Correspondencia\Repositories\Contracts\EstatusRepositoryInterface;
use Modules\Correspondencia\Models\Estatus;

class EstatusRepository implements EstatusRepositoryInterface
{
    // Implementación de los métodos del repositorio
    public function all()
    {
        return Estatus::all();
    }

    public function find(int $id)
    {
        return Estatus::find($id);
    }

    public function create(array $data)
    {
        $data['nombre_estatus'] = strtolower(trim($data['nombre_estatus']));
        return Estatus::create($data);
    }

    public function update(int $id, array $data)
    {
        $tipo = Estatus::find($id);
        if ($tipo) {
            $tipo->update($data);
            return $tipo;
        }
        return null;
    }

    public function delete(int $id)
    {
        $tipo = Estatus::find($id);
        if ($tipo) {
            return $tipo->delete();
        }
        return false;
    }
}