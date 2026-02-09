<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Tour.
 * Un tour es un itinerario que agrupa varios destinos.
 * Ejemplo: "Capitales europeas" incluye París, Roma, Berlín, etc.
 */
class Tour extends Model
{
    protected $fillable = ['name'];

    /**
     * Relación MUCHOS A MUCHOS: Un tour tiene varios destinos.
     * La tabla pivote 'destination_tour' guarda las relaciones.
     * Uso attach() para añadir destinos y detach() para quitarlos.
     */
    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
}
