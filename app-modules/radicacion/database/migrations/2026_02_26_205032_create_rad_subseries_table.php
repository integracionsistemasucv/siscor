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
        Schema::create('rad_subseries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serie_id')->constrained('rad_series')->onDelete('cascade');
            $table->string('codigo', 10)->comment('Código archivistico de la subserie ');
            $table->string('nombre', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rad_subseries');
    }
};
