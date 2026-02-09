<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Comment (Comentario).
 * Los usuarios pueden dejar comentarios en las actividades.
 * Cada comentario tiene un texto, autor y pertenece a una actividad.
 */
class Comment extends Model
{
    // Campos asignables masivamente
    protected $fillable = ['text', 'author', 'activity_id'];

    /**
     * Relación: Un comentario pertenece a UNA actividad.
     * Puedo acceder a la actividad con $comment->activity
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
