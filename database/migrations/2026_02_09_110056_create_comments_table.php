<?php

/**
 * Migración para crear la tabla de comentarios.
 * Los comentarios están asociados a actividades (relación 1:N).
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();                    // ID autoincrementable
            $table->text('text');            // El texto del comentario (puede ser largo)
            $table->string('author');        // Nombre del autor del comentario
            
            // Clave foránea a la tabla activities
            // onDelete('cascade') significa que si se borra la actividad,
            // se borran automáticamente todos sus comentarios
            $table->foreignId('activity_id')
                  ->constrained()
                  ->onDelete('cascade');
            
            $table->timestamps();            // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};