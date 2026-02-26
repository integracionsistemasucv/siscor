<?php

namespace Modules\Radicacion\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Modules\Radicacion\Services\RadicacionService;
use Modules\Radicacion\Repositories\Contracts\TipoRadicadoRepositoryInterface;

class RadicadoController
{
    public function __construct(
        protected RadicacionService $radicacionService,
        protected TipoRadicadoRepositoryInterface $tipoRepo
    ) {}

    /**
     * Muestra la bandeja de entrada del usuario
     */
    public function index()
    {
        return Inertia::render('radicacion::index', [
            'radicados' => $this->radicacionService->getMisRadicados(),
        ]);
    }

    /**
     * Muestra el formulario de radicación
     */
    public function create()
    {
        return Inertia::render('Radicacion::Create', [
            'tiposRadicados' => $this->tipoRepo->allActive(),
        ]);
    }

    /**
     * Procesa la creación de un nuevo radicado
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_radicado_id' => 'required|exists:rad_tipos_radicados,id',
            'asunto'           => 'required|string|min:10|max:500',
            'descripcion_anexos' => 'nullable|string',
        ]);

        try {
            $radicado = $this->radicacionService->radicar($validated);

            return Redirect::route('radicacion.index')
                ->with('message', "Documento radicado exitosamente bajo el nro: {$radicado->numero_radicado}");

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
