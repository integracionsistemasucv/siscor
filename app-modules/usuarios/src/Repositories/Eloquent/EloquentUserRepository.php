<?php

namespace Modules\Usuarios\Repositories\Eloquent;

use Modules\Usuarios\Repositories\Contracts\UserRepositoryInterface;
use Modules\Usuarios\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    // Implementación de los métodos del repositorio
    public function all()
    {
        // Lógica para obtener todos los usuarios
        return User::all();
    }

    public function paginate(array $filters = [], int $perPage = 10)
    {
        $sortField = $filters['sortField'] ?? 'name';
        // PrimeVue usa 1 para ASC y -1 para DESC
        $sortDirection = ($filters['sortOrder'] ?? 1) == 1 ? 'asc' : 'desc';

        // Iniciamos la consulta sin ejecutarla todavía
        return User::query()
            // El método 'when' solo ejecuta el filtro si hay algo en 'search'
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate($perPage)
            ->withQueryString(); // IMPORTANTE: mantiene el parámetro ?search en los botones 1, 2, 3...
    }
}
