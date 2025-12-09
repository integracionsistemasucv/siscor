<?php

namespace Modules\Correspondencia\Repositories\Eloquent;

use Modules\Correspondencia\Repositories\Contracts\TiposRepositoryInterface;


use Modules\Correspondencia\Models\Tipos;

class TiposRepository implements TiposRepositoryInterface
{
    // Implementación de los métodos del repositorio
    public function all()
    {
        return Tipos::all();
    }

    public function find(int $id)
    {
        return Tipos::find($id);
    }

    public function create(array $data)
    {
        $data['nombre_tipo'] = strtolower(trim($data['nombre_tipo']));
        return Tipos::create($data);
    }

    public function update(int $id, array $data)
    {
        $tipo = Tipos::find($id);
        if ($tipo) {
            $tipo->update($data);
            return $tipo;
        }
        return null;
    }

    public function delete(int $id)
    {
        $tipo = Tipos::find($id);
        if ($tipo) {
            return $tipo->delete();
        }
        return false;
    }
}