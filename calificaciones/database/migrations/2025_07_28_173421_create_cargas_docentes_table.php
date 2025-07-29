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
       Schema::create('cargas_docentes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade');
    $table->foreignId('pnf_uc_trayect_trim_id')->constrained('pnf_uc_trayect_trim')->onDelete('cascade');
    $table->foreignId('aldea_id')->constrained('aldeas')->onDelete('cascade');
    $table->foreignId('periodo_id')->constrained('periodos')->onDelete('cascade'); // si defines los ciclos
    $table->boolean('activo')->default(true);
    $table->timestamps();

    $table->unique(['profesor_id', 'pnf_uc_trayect_trim_id', 'aldea_id', 'periodo_id'], 'unique_docente_uc_contexto');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargas_docentes');
    }
};
