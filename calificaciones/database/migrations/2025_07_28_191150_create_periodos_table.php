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
       Schema::create('periodos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->unique(); // Ej: 2025-I, 2025-II
    $table->date('inicio');
    $table->date('fin');
    $table->boolean('activo')->default(true); // ¿está actualmente en uso?
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos');
    }
};
