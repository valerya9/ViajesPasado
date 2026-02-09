<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Destination;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar las actividades.
 * Las actividades pertenecen a destinos y pueden tener comentarios.
 */
class ActivityController extends Controller
{
    /**
     * Muestra el listado de todas las actividades.
     * Uso with('comments') para cargar los comentarios de una vez (eager loading)
     * y evitar el problema N+1 de consultas.
     */
    public function index()
    {
        $activities = Activity::with('comments')->get();
        return view('activities.index', compact('activities'));
    }

    /**
     * Muestra solo las actividades de un destino específico.
     * Este método se llama cuando hago clic en "X actividades" desde la vista de destinos.
     * Laravel inyecta automáticamente el modelo Destination gracias al Route Model Binding.
     */
    public function byDestination(Destination $destination)
    {
        // Uso la relación del modelo para obtener las actividades y cargo también sus comentarios
        $activities = $destination->activities()->with('comments')->get();
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Muestra el detalle de una actividad con sus comentarios.
     * Aquí uso load() en vez de with() porque la actividad ya está inyectada.
     * Esto carga las relaciones 'destination' y 'comments' para mostrarlas en la vista.
     */
    public function show(Activity $activity)
    {
        $activity->load(['destination', 'comments']);
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
