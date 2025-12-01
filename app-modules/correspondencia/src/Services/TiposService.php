<?php

namespace Modules\Correspondencia\Services;

use Modules\Correspondencia\Repositories\Contracts\TiposRepositoryInterface;

class TiposService
{
    public function __construct(private TiposRepositoryInterface $repo){}

    public function getAllTipos()
    {
        return $this->repo->all();
    }

    public function getTipoById(int $id)
    {
        return $this->repo->find($id);
    }

    public function createTipo(array $data)
    {
        return $this->repo->create($data);
    }

    public function updateTipo(int $id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function deleteTipo(int $id)
    {
        return $this->repo->delete($id);
    }
}