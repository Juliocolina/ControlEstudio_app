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
       Schema::create('pnf_tray_trim', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pnf_id')->constrained()->onDelete('cascade');
    $table->foreignId('trayecto_id')->constrained()->onDelete('cascade');
    $table->foreignId('trimestre_id')->constrained()->onDelete('cascade');

    // Reglas adicionales (opcional pero recomendable)
    $table->unique(['pnf_id', 'trayecto_id', 'trimestre_id'], 'unique_pnf_tray_trim');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnf_tray_trim');
    }
};
