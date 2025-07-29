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
        Schema::create('pnfs', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->unique();     // Ej: 'Informática', 'Educación Integral'
    $table->string('codigo')->nullable();   // Ej: 'INF-01', 'ADM-03'
    $table->text('descripcion')->nullable();// Información adicional
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnfs');
    }
};
