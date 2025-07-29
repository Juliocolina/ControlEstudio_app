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
        Schema::create('pnf_uc_trayect_trim', function (Blueprint $table) {
    $table->id();

    $table->foreignId('pnf_id')->constrained('pnfs')->onDelete('cascade');
    $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');
    $table->foreignId('trayecto_id')->constrained('trayectos')->onDelete('cascade');
    $table->foreignId('trimestre_id')->constrained('trimestres')->onDelete('cascade');
    $table->unsignedTinyInteger('duracion')->default(1); // Trimestres que dura la UC (1, 2, o 3)
    $table->string('codigo')->nullable(); // Ej: 'INF-101-T2-T1'
    $table->timestamps();

    $table->unique(['pnf_id', 'materia_id', 'trayecto_id', 'trimestre_id']); // Evita duplicados
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnf_uc_tray_trim');
    }
};
