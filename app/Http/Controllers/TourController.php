<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Destination;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar los tours de viaje.
 * Un tour es un itinerario que agrupa varios destinos.
 * La relación con destinos es muchos a muchos (un tour tiene varios destinos
 * y un destino puede estar en varios tours).
 */
class TourController extends Controller
{
    /**
     * Muestra todos los tours con sus destinos.
     * También paso todos los destinos para el selector de "añadir destino".
     */
    public function index()
    {
        // Cargo tours con sus destinos (relación muchos a muchos)
        $tours = Tour::with('destinations')->get();
        
        // Necesito todos los destinos para el desplegable de añadir
        $allDestinations = Destination::orderBy('name')->get();
        
        return view('tours.index', compact('tours', 'allDestinations'));
    }

    /**
     * Añade un destino a un tour.
     * Uso attach() para añadir una relación en la tabla pivote destination_tour.
     */
    public function addDestination(Request $request, Tour $tour)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
        ]);

        // Compruebo que no esté ya añadido para evitar duplicados
        if (!$tour->destinations->contains($request->destination_id)) {
            $tour->destinations()->attach($request->destination_id);
        }

        return redirect()->route('tours.index');
    }

    /**
     * Elimina un destino de un tour.
     * Uso detach() para quitar la relación de la tabla pivote.
     * Esto NO borra el destino, solo lo quita del tour.
     */
    public function removeDestination(Tour $tour, Destination $destination)
    {
        $tour->destinations()->detach($destination->id);
        return redirect()->route('tours.index');
    }
}
