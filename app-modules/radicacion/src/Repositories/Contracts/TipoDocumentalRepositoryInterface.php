<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface TipoDocumentalRepositoryInterface
{
    public function getBySubSerie(int $subSerieId);
}