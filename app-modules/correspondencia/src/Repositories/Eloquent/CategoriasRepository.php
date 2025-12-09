<?php

namespace Modules\Correspondencia\Repositories\Eloquent;

use Modules\Correspondencia\Repositories\Contracts\CategoriasRepositoryInterface;
use Modules\Correspondencia\Models\Categorias;

class CategoriasRepository implements CategoriasRepositoryInterface
{
    // Implementación de los métodos del repositorio
    public function all()
    {
        return Categorias::all();
    }

    public function find(int $id)
    {
        return Categorias::find($id);
    }

    public function create(array $data)
    {
        $data['nombre_categoria'] = strtolower(trim($data['nombre_categoria']));
        return Categorias::create($data);
    }

    public function update(int $id, array $data)
    {
        $tipo = Categorias::find($id);
        if ($tipo) {
            $tipo->update($data);
            return $tipo;
        }
        return null;
    }

    public function delete(int $id)
    {
        $tipo = Categorias::find($id);
        if ($tipo) {
            return $tipo->delete();
        }
        return false;
    }
}