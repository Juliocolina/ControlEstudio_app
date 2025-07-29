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
       Schema::create('profesores', function (Blueprint $table) {
    $table->id();
    $table->string('cedula')->unique(); // identificación nacional
    $table->string('nombre');
    $table->string('apellido');
    $table->string('correo')->unique();
    $table->string('telefono')->nullable();
    $table->string('titulo')->nullable(); // Ej: Licenciado, Magister
    $table->string('especialidad')->nullable(); // Ej: Matemáticas, Educación Integral
    $table->boolean('activo')->default(true);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
