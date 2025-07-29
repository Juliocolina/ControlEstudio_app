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
        Schema::create('estudiantes', function (Blueprint $table) {
    $table->id();

    // 📋 Información básica
    $table->string('cedula', 20)->unique();       
    $table->string('nombre', 100);               
    $table->string('apellido', 100);             
    $table->date('fecha_nacimiento');            
    $table->string('correo', 100)->unique();     
    $table->string('telefono', 15)->nullable(); 

    // 📎 Relaciones
    $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
    $table->foreignId('aldea_id')->constrained('aldeas')->onDelete('cascade');      // Aldea asignada
    $table->foreignId('pnf_id')->constrained('pnfs')->onDelete('cascade');          // PNF actual
    $table->foreignId('trayecto_id')->constrained('trayectos')->onDelete('cascade'); // Trayecto académico
    $table->foreignId('trimestre_id')->constrained('trimestres')->onDelete('cascade'); // Trimestre actual

    $table->string('codigo_estudiante', 20)->unique(); // Ej: 'INF-EST-015'
    
    // 🔄 Estado académico real
    $table->enum('estado_academico', ['activo', 'congelado', 'retirado', 'graduado'])->default('activo');

    $table->text('observaciones')->nullable();     // Notas especiales

    // 🕒 Fechas importantes
    $table->date('fecha_ingreso')->nullable();     // Inicio en el sistema
    $table->date('fecha_graduacion')->nullable();  // Si ya culminó

    // 📦 Información adicional
    $table->string('foto')->nullable();            // Ruta foto de perfil
    $table->string('direccion')->nullable();       // Dirección física
    $table->string('nacionalidad', 50)->default('Venezolano');
    $table->string('genero', 10)->default('Masculino');
    $table->string('religion', 50)->nullable();
    $table->string('etnia', 50)->nullable();
    $table->string('discapacidad', 50)->nullable();
    $table->string('nivel_estudio', 50)->default('Bachillerato');
    $table->string('institucion_procedencia', 100)->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
