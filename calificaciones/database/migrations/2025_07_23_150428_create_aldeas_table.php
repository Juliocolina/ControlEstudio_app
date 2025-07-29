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
Schema::create('aldeas', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->unique();          // Ej: 'Aldea Universitaria San Antonio'
    $table->string('codigo')->nullable();        // Código institucional si aplica
    $table->string('direccion')->nullable();     // Ubicación física de la sede
    $table->text('descripcion')->nullable();     // Información adicional (facultativa)
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aldeas');
    }
};
