<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface RadicadoRepositoryInterface
{
    public function create(array $data);
    public function findByNumero(string $numeroRadicado);
    public function getByUserActual(int $userId, int $perPage = 15);
    public function updateActualUser(int $radicadoId, int $newUserId);

    // Para el timeline de la interfaz Vue
    public function getWithHistoricos(int $radicadoId);
}