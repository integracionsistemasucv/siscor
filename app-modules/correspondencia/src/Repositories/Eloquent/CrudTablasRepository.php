<?php

namespace Modules\Correspondencia\Repositories\Eloquent;

use Modules\correspondencia\Repositories\Contracts\CrudTablasRepositoryInterface;

use Modules\Correspondencia\Models\Categorias;
use Modules\Correspondencia\Models\Estatus;
use Modules\Correspondencia\Models\Tipos;

class CrudTablasRepository implements CrudTablasRepositoryInterface
{
    // Implementación de los métodos del repositorio
    public function getAllCatalogs(): array
    {
        return [
            'tipos'      => Tipos::all(),
            'categorias' => Categorias::all(),
            'estatus'    => Estatus::all(),
        ];
    }
}