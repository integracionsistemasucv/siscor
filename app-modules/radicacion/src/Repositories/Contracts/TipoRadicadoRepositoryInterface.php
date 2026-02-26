<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface TipoRadicadoRepositoryInterface
{
   public function allActive();
    public function findById(int $id);
}