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
        Schema::create('rad_historicos', function (Blueprint $table) {
            $table->id();

            // relacion con el radicado
            $table->foreignId('radicado_id')->constrained('radicados')->onDelete('cascade');

            // quien realiza la accion (origen) 
            $table->foreignId('usuario_origen_id')->constrained('users');

            // quien recibe la accion (destino) - Nullable porque no toda acción tiene destino
            $table->foreignId('usuario_destino_id')->nullable()->constrained('users');

            // Tipo de movimiento (Ej: RADICACION, REASIGNACION, ARCHIVADO, ANULACION)
            // Orfeo usa IDs, pero en Laravel moderno es más legible usar strings o un ENUM
            $table->string('tipo_movimiento', 50);

            // comentario o detalle de la accion
            $table->text('descripcion')->nullable();

            // Para trazabilidad técnica (Opcional pero recomendado)
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rad_historicos');
    }
};
