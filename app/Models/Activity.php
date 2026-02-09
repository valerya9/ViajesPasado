<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Activity (Actividad).
 * Representa una actividad turística que pertenece a un destino.
 * Ejemplo: "Visita guiada al Coliseo" pertenece al destino "Roma".
 */
class Activity extends Model
{
    // Campos que se pueden asignar masivamente con create() o fill()
    protected $fillable = ['name', 'description', 'price', 'duration', 'destination_id'];

    /**
     * Relación: Una actividad pertenece a UN destino.
     * Esto me permite hacer $activity->destination para obtener el destino.
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    /**
     * Relación: Una actividad puede tener MUCHOS comentarios.
     * Esto me permite hacer $activity->comments para obtener todos sus comentarios.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
