<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Destination (Destino).
 * Representa un lugar turístico como "París", "Roma", etc.
 * Tiene actividades asociadas y puede pertenecer a varios tours.
 */
class Destination extends Model
{
    protected $fillable = ['name', 'country', 'description', 'image'];

    /**
     * Relación: Un destino tiene MUCHAS actividades.
     * Ejemplo: Roma tiene "Visita al Coliseo", "Tour por el Vaticano", etc.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function guides()
    {
        return $this->hasMany(Guides::class);
    }

    /**
     * Relación MUCHOS A MUCHOS: Un destino puede estar en varios tours.
     * Laravel busca automáticamente la tabla pivote 'destination_tour'.
     * Ejemplo: Roma puede estar en "Capitales europeas" y en "Italia maravillosa".
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
