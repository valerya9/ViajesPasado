<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar los comentarios.
 * Los comentarios pertenecen a actividades y se pueden crear desde
 * la vista de detalle de actividad o ver/borrar desde el listado general.
 */
class CommentController extends Controller
{
    /**
     * Muestra todos los comentarios de la aplicación.
     * Uso activity.destination para cargar la actividad Y su destino de una vez,
     * así puedo mostrar "Actividad (Destino)" en la tabla.
     */
    public function index()
    {
        $comments = Comment::with('activity.destination')->get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Guarda un nuevo comentario.
     * Este método se llama desde el formulario de la vista show de actividad.
     * El activity_id viene oculto en el formulario.
     */
    public function store(Request $request)
    {
        // Primero valido que los datos sean correctos
        $request->validate([
            'text' => 'required|min:3',       // El comentario debe tener al menos 3 caracteres
            'author' => 'required|min:2',     // El nombre del autor al menos 2
            'activity_id' => 'required|exists:activities,id',  // La actividad debe existir
        ]);

        // Creo el comentario con los datos validados
        Comment::create([
            'text' => $request->text,
            'author' => $request->author,
            'activity_id' => $request->activity_id,
        ]);

        // Redirijo de vuelta a la actividad para ver el comentario nuevo
        return redirect()->route('activities.show', $request->activity_id);
    }

    /**
     * Elimina un comentario.
     * Laravel inyecta el Comment automáticamente gracias al Route Model Binding.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index');
    }
}
