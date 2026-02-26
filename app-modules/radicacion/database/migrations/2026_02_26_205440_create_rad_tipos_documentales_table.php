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
        Schema::create('rad_tipos_documentales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subserie_id')->constrained('rad_subseries')->onDelete('cascade');
            $table->string('nombre', 200);
            $table->integer('dias_termino')->default(15)->comment('Días hábiles para dar respuesta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rad_tipos_documentales');
    }
};
