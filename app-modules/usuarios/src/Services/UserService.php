<?php

namespace Modules\Usuarios\Services;

use Modules\Usuarios\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    public function __construct(private UserRepositoryInterface $repo)
    {}

    public function getAllUsers()
    {
        return $this->repo->all();
    }
}