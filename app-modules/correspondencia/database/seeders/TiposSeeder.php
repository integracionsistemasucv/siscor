<?php

namespace Modules\Correspondencia\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Correspondencia\Models\Tipos;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre_tipo' => 'Oficio'],
            ['nombre_tipo' => 'Memorando'],
            ['nombre_tipo' => 'Carta'],
            ['nombre_tipo' => 'Informe'],
            ['nombre_tipo' => 'Circular'],
            ['nombre_tipo' => 'Acta'],
            ['nombre_tipo' => 'Resolución'],
            ['nombre_tipo' => 'Solicitud'],
        ];

        foreach ($tipos as $tipo) {
            Tipos::firstOrCreate($tipo);
        }
    }
}
