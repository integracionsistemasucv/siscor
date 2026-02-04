<?php

namespace Modules\Usuarios\Services;

use Modules\Usuarios\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function getAllUsers()
    {
        return $this->repo->all();
    }

    public function getPaginatedUsers($perPage = 10, array $filters = [])
    {
        return $this->repo->paginate($filters, $perPage);
    }
}
