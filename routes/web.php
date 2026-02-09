<?php

/*
|--------------------------------------------------------------------------
| Rutas Web de la aplicación
|--------------------------------------------------------------------------
| Aquí defino todas las rutas de mi aplicación de viajes.
| Uso Route::resource para crear automáticamente las rutas CRUD
| y rutas personalizadas para funcionalidades específicas.
*/

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas CRUD completas para destinos (index, create, store, show, edit, update, destroy)
Route::resource('destinations', DestinationController::class);

/*
 * Ruta personalizada para filtrar actividades por destino.
 * Cuando hago clic en "X actividades" de un destino, me lleva aquí.
 * El parámetro {destination} se inyecta automáticamente como modelo (Route Model Binding).
 */
Route::get('destinations/{destination}/activities', [ActivityController::class, 'byDestination'])
    ->name('destinations.activities');

// Rutas CRUD completas para actividades
Route::resource('activities', ActivityController::class);

/*
 * RUTAS DE COMENTARIOS
 * No uso resource porque solo necesito algunas acciones específicas:
 * - index: ver todos los comentarios
 * - store: guardar nuevo comentario (desde la vista de actividad)
 * - destroy: borrar un comentario
 */
Route::get('comments', [App\Http\Controllers\CommentController::class, 'index'])
    ->name('comments.index');
Route::post('comments', [App\Http\Controllers\CommentController::class, 'store'])
    ->name('comments.store');
Route::delete('comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])
    ->name('comments.destroy');

/*
 * RUTAS DE TOURS
 * - index: listar todos los tours con sus destinos
 * - addDestination: añadir un destino a un tour (relación muchos a muchos)
 * - removeDestination: quitar un destino de un tour
 */
Route::get('tours', [App\Http\Controllers\TourController::class, 'index'])
    ->name('tours.index');
Route::post('tours/{tour}/destinations', [App\Http\Controllers\TourController::class, 'addDestination'])
    ->name('tours.addDestination');
Route::delete('tours/{tour}/destinations/{destination}', [App\Http\Controllers\TourController::class, 'removeDestination'])
    ->name('tours.removeDestination');