<?php

namespace Modules\Correspondencia\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Correspondencia\Services\CategoriasService;
use Modules\Correspondencia\Http\Requests\CategoriaRequest;

class CategoriasController
{
    public function __construct(
        private CategoriasService $categoriasService
    ) {}

    public function getCategorias()
    {
        return $this->categoriasService->getAllCategorias();
    }

    public function getCategoriaById(int $id)
    {
        return $this->categoriasService->getCategoriaById($id);
    }

    public function createCategoria(CategoriaRequest $request)
    {
        return $this->categoriasService->createCategoria($request->validated());
    }

    public function updateCategoria(int $id, CategoriaRequest $request)
    {
        return $this->categoriasService->updateCategoria($id, $request->validated());
    }

    public function deleteCategoria(int $id)
    {
        return $this->categoriasService->deleteCategoria($id);
    }
}
