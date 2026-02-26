<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface SubSerieRepositoryInterface
{
    public function getBySerie(int $serieId);
    
}