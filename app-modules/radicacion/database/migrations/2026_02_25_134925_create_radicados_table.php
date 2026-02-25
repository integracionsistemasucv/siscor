<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('radicados', function (Blueprint $table) {
            $table->id();
            $table->string('numero_radicado', 25)->unique()->comment('ID oficial (Ej: 2026-E-000001)');
            $table->foreignId('tipo_radicado_id')->constrained('rad_tipos_radicados');
            $table->string('asunto', 500);
            $table->text('descripcion_anexos')->nullable();

            // trazabilidad basica de asignacion
            $table->foreignId('usuario_creador_id')->constrained('users');
            $table->foreignId('usuario_actual_id')->constrained('users');
            $table->foreignId('dependencia_actual_id')->nullable();

            $table->timestamp('fecha_radicado');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radicados');
    }
};
