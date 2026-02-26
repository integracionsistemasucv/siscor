<?php

namespace Modules\Radicacion\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Radicacion\Repositories\Contracts\ConsecutivoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\TipoRadicadoRepositoryInterface;
use Exception;

class GenerateRadicadoNumber
{
    public function __construct(
        protected ConsecutivoRepositoryInterface $consecutivoRepo,
        protected TipoRadicadoRepositoryInterface $tipoRepo
    ){}

    /**
     * @throws Exception
     */

    public function execute(int $tipoRadicadoId): string
    {
        return DB::transaction(function() use ($tipoRadicadoId){
            $anioActual = now()->year;
            
            // 1. Obtener el tipo de radicado para conocer el prefijo y formato
            $tipo = $this->tipoRepo->findById($tipoRadicadoId);

            // 2. Obtener y bloquear el contador
            $consecutivo = $this->consecutivoRepo->getAndLock($tipoRadicadoId, $anioActual);

            if (!$consecutivo) {
                // Si es el primer radicado del año para este tipo, creamos el registro
                // Nota: Usamos el modelo directo aquí o podrías añadir un método create al Repo
                $consecutivo = \Modules\Radicacion\Models\Consecutivo::create([
                    'tipo_radicado_id' => $tipoRadicadoId,
                    'anio' => $anioActual,
                    'ultimo_valor' => 0
                ]);
            }

            // 3. Incrementar el contador
            $nuevoValor = $consecutivo->ultimo_valor + 1;
            $consecutivo->update(['ultimo_valor' => $nuevoValor]);

            // 4. Formatear el número final: YYYY-Prefijo-00000X
            $secuencia = str_pad(
                $nuevoValor, 
                $tipo->longitud_secuencia, 
                '0', 
                STR_PAD_LEFT
            );

            return "{$anioActual}-{$tipo->prefijo}-{$secuencia}";
        });
    }
}