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
        Schema::create('rad_series', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->comment('Código archivistico de la serie ');
            $table->string('nombre', 200);
            $table->string('dependencia_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rad_series');
    }
};
