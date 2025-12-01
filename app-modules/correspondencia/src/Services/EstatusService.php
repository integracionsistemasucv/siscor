<?php

namespace Modules\Correspondencia\Services;

use Modules\Correspondencia\Repositories\Contracts\EstatusRepositoryInterface;

class EstatusService
{
    public function __construct(private EstatusRepositoryInterface $repo){}

    public function getAllEstatus()
    {
        return $this->repo->all();
    }

    public function getEstatusById(int $id)
    {
        return $this->repo->find($id);
    }

    public function createEstatus(array $data)
    {
        return $this->repo->create($data);
    }

    public function updateEstatus(int $id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function deleteEstatus(int $id)
    {
        return $this->repo->delete($id);
    }
}