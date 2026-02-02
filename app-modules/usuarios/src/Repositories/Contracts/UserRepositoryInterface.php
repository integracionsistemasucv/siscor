<?php

namespace Modules\Usuarios\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function all();
    public function paginate(array $filters = [], int $perPage = 10);
}