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
        Schema::create('rad_consecutivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_radicado_id')->constrained('rad_tipos_radicados');
            $table->year('anio');
            $table->integer('ultimo_valor')->default(0);
            $table->unique(['tipo_radicado_id', 'anio']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rad_consecutivos');
    }
};
