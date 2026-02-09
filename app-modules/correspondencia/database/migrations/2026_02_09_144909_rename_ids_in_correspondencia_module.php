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
        Schema::table('categorias', function (Blueprint $table) {
            $table->renameColumn('id_categoria', 'id');
        });
        Schema::table('estatus', function (Blueprint $table) {
            $table->renameColumn('id_estatus', 'id');
        });
        Schema::table('tipos', function (Blueprint $table) {
            $table->renameColumn('id_tipo', 'id'); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->renameColumn('id', 'id_categoria');
        });
        Schema::table('estatus', function (Blueprint $table) {
            $table->renameColumn('id', 'id_estatus');
        });
        Schema::table('tipos', function (Blueprint $table) {
            $table->renameColumn('id', 'id_tipo'); 
        });
    }
};
