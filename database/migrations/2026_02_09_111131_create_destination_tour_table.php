<?php

/**
 * Migración para crear la TABLA PIVOTE de la relación muchos a muchos.
 * 
 * En Laravel, cuando tienes una relación muchos a muchos (como Tour <-> Destination),
 * necesitas una tabla intermedia que guarde las relaciones.
 * 
 * El nombre de la tabla pivote debe ser los dos modelos en singular,
 * en orden alfabético y separados por guion bajo: destination_tour
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destination_tour', function (Blueprint $table) {
            $table->id();
            
            // FK al tour - si se borra el tour, se borran las relaciones
            $table->foreignId('tour_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            // FK al destino - si se borra el destino, se borran las relaciones
            $table->foreignId('destination_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destination_tour');
    }
};
