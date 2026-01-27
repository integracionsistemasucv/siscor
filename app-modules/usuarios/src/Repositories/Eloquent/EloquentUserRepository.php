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
}