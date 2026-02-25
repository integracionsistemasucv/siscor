<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface HistoricoRepositoryInterface
{
    public function logEvent(array $data);
    public function getByRadicado(int $radicadoId);
}