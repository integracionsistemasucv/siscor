<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface SerieRepositoryInterface
{
    public function getByDependencia(string $dependenciaId);
    public function finWithSubseries(int $id);
}