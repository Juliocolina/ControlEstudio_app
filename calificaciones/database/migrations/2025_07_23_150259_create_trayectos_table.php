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
       Schema::create('trayectos', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->unique();      // Ej: 'I', 'II', 'III'
    $table->string('slug')->unique();        // Ej: 'primero', 'segundo'
    $table->text('descripcion')->nullable(); // Info opcional
    $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trayectos');
    }
};
