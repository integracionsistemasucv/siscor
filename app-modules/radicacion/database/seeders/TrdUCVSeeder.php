<?php

namespace Modules\Radicacion\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrdUCVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- SERIE 1: ACTAS (Para el Consejo Universitario - Dep ID ficticio 'CU-01') ---
        $serieActas = DB::table('rad_series')->insertGetId([
            'codigo' => '100',
            'nombre' => 'ACTAS DE SESIÓN',
            'dependencia_id' => 'CU-01',
            'created_at' => now()
        ]);

        $subserieOrdinarias = DB::table('rad_subseries')->insertGetId([
            'serie_id' => $serieActas,
            'codigo' => '100.01',
            'nombre' => 'SESIONES ORDINARIAS',
            'created_at' => now()
        ]);

        DB::table('rad_tipos_documentales')->insert([
            ['subserie_id' => $subserieOrdinarias, 'nombre' => 'Acta de Sesión', 'dias_termino' => 5],
            ['subserie_id' => $subserieOrdinarias, 'nombre' => 'Anexo de Resolución', 'dias_termino' => 0]
        ]);

        // --- SERIE 2: EXPEDIENTES ACADÉMICOS (Para Control de Estudios - Dep ID 'CE-05') ---
        $serieExp = DB::table('rad_series')->insertGetId([
            'codigo' => '200',
            'nombre' => 'EXPEDIENTES DE ESTUDIANTES',
            'dependencia_id' => 'CE-05',
            'created_at' => now()
        ]);

        $subserieGrado = DB::table('rad_subseries')->insertGetId([
            'serie_id' => $serieExp,
            'codigo' => '200.10',
            'nombre' => 'SOLICITUDES DE GRADO',
            'created_at' => now()
        ]);

        DB::table('rad_tipos_documentales')->insert([
            ['subserie_id' => $subserieGrado, 'nombre' => 'Certificación de Notas', 'dias_termino' => 15],
            ['subserie_id' => $subserieGrado, 'nombre' => 'Constancia de Conducta', 'dias_termino' => 5],
            ['subserie_id' => $subserieGrado, 'nombre' => 'Solvencia de Biblioteca', 'dias_termino' => 3]
        ]);

        // --- SERIE 3: CONVENIOS (Para Rectorado - Dep ID 'REC-01') ---
        $serieConv = DB::table('rad_series')->insertGetId([
            'codigo' => '300',
            'nombre' => 'CONVENIOS Y ALIANZAS',
            'dependencia_id' => 'REC-01',
            'created_at' => now()
        ]);

        $subserieInter = DB::table('rad_subseries')->insertGetId([
            'serie_id' => $serieConv,
            'codigo' => '300.05',
            'nombre' => 'CONVENIOS INTERNACIONALES',
            'created_at' => now()
        ]);

        DB::table('rad_tipos_documentales')->insert([
            ['subserie_id' => $subserieInter, 'nombre' => 'Memorando de Entendimiento', 'dias_termino' => 30],
            ['subserie_id' => $subserieInter, 'nombre' => 'Acuerdo Marco', 'dias_termino' => 45]
        ]);
    }
}
