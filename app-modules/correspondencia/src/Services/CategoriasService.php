<?php

namespace Modules\Correspondencia\Services;

use Modules\Correspondencia\Repositories\Contracts\CategoriasRepositoryInterface;

class CategoriasService
{
    public function __construct(private CategoriasRepositoryInterface $repo){}

    public function getAllCategorias()
    {
        return $this->repo->all();
    }

    public function getCategoriaById(int $id)
    {
        return $this->repo->find($id);
    }

    public function createCategoria(array $data)
    {
        return $this->repo->create($data);
    }

    public function updateCategoria(int $id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function deleteCategoria(int $id)
    {
        return $this->repo->delete($id);
    }
}