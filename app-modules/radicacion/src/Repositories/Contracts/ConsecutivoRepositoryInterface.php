<?php

namespace Modules\Radicacion\Repositories\Contracts;

interface ConsecutivoRepositoryInterface
{
    /**
     * Obtiene el registro y bloquea la fila para evitar duplicados en alta concurrencia
     */
    public function getAndLock(int $tipoRadicadoId, int $anio);
    
    public function incrementValue(int $consecutivoId);
}