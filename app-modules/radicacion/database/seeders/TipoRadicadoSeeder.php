<?php

namespace Modules\Radicacion\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Radicacion\Models\TipoRadicado;

class TipoRadicadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoRadicado::create([
            'nombre' => 'Entrada',
            'descripcion' => 'Documentos recibidos externamente',
            'prefijo' => 'E',
            'longitud_secuencia' => 6
        ]);

        TipoRadicado::create([
            'nombre' => 'Salida',
            'descripcion' => 'Documentos enviados a terceros',
            'prefijo' => 'S',
            'longitud_secuencia' => 6
        ]);
    }
}
