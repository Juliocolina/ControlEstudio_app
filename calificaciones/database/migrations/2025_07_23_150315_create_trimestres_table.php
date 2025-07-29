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
       Schema::create('trimestres', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->unique();          // Ej: 'Trimestre 1', 'Trimestre 2', etc.
    $table->date('fecha_inicio');                // Inicio del periodo académico
    $table->date('fecha_fin');                   // Fin del periodo académico
    $table->text('descripcion')->nullable();     // Info adicional (opcional)
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trimestres');
    }
};
