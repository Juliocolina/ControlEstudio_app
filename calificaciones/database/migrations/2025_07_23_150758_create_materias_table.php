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
        Schema::create('materias', function (Blueprint $table) {
             $table->id();
             $table->foreignId('pnf_id')->constrained('pnfs')->onDelete('cascade'); // Relación con PNF
             $table->string('nombre')->unique();           // Ej: 'Programación I', 'Matemática'
             $table->string('codigo')->nullable();         // Ej: 'INF-101', 'MAT-201'
             $table->unsignedTinyInteger('creditos');      // Cantidad de unidades de crédito
             $table->text('descripcion')->nullable();      // Detalles o contenido general
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
