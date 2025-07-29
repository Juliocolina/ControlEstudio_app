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
       Schema::create('inscripcion_estudiante', function (Blueprint $table) {
    $table->id();

    $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('cascade');
    $table->foreignId('pnf_uc_trayect_trim_id')->constrained('pnf_uc_trayect_trim')->onDelete('cascade');

    $table->enum('estado', ['inscrito', 'retirado', 'reprobado', 'aprobado'])->default('inscrito'); // Estado académico de la UC
    $table->unsignedTinyInteger('intentos')->default(1); // Número de veces que ha inscrito esta UC

    $table->timestamps();

    $table->unique(['estudiante_id', 'pnf_uc_trayect_trim_id']); // Evita inscripciones duplicadas
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripcion_estudiante');
    }
};
