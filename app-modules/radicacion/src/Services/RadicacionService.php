<?php

namespace Modules\Radicacion\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Radicacion\Actions\GenerateRadicadoNumber;
use Modules\Radicacion\Repositories\Contracts\RadicadoRepositoryInterface;
use Modules\Radicacion\Repositories\Contracts\HistoricoRepositoryInterface;
use Exception;

class RadicacionService
{
    public function __construct(
        protected GenerateRadicadoNumber $generateNumberAction,
        protected RadicadoRepositoryInterface $radicadoRepo,
        protected HistoricoRepositoryInterface $historicoRepo
    ) {}

    /**
     * Proceso principal de radicación
     */
    public function radicar(array $data)
    {
        return DB::transaction(function () use ($data) {
            try {
                // 1. Generar el número oficial (Llama al Action que bloquea la tabla)
                $numeroOficial = $this->generateNumberAction->execute($data['tipo_radicado_id']);

                // 2. Preparar los datos para el repositorio
                // El usuario que radica es el creador y el poseedor inicial
                $radicadoData = [
                    'numero_radicado'    => $numeroOficial,
                    'tipo_radicado_id'   => $data['tipo_radicado_id'],
                    'asunto'             => strtoupper($data['asunto']), // Convención Orfeo
                    'descripcion_anexos' => $data['descripcion_anexos'] ?? null,
                    'usuario_creador_id' => Auth::id(),
                    'usuario_actual_id'  => Auth::id(),
                    'fecha_radicado'     => now(),
                ];

                // 3. Crear el Radicado
                $radicado = $this->radicadoRepo->create($radicadoData);

                // 4. Registrar el evento en el Histórico (Trazabilidad)
                $this->historicoRepo->logEvent([
                    'radicado_id'        => $radicado->id,
                    'usuario_origen_id'  => Auth::id(),
                    'usuario_destino_id' => Auth::id(), // Al radicar, el destino es uno mismo
                    'tipo_transaccion'   => 'RADICACION',
                    'descripcion'        => "Creación inicial del radicado nro {$numeroOficial}",
                    'ip_address'         => request()->ip(),
                    'user_agent'         => request()->userAgent(),
                ]);

                // 5. TODO: Aquí podrías llamar a un servicio de archivos si subieron un PDF
                // if (isset($data['archivo'])) { ... }

                return $radicado;

            } catch (Exception $e) {
                // Si algo sale mal, la transacción hace rollback automáticamente
                throw new Exception("Error en el proceso de radicación: " . $e->getMessage());
            }
        });
    }

    /**
     * Obtener la bandeja de entrada del usuario actual
     */
    public function getMisRadicados()
    {
        return $this->radicadoRepo->getByUserActual(Auth::id());
    }
}
