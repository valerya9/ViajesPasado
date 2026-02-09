{{-- 
    Vista del listado de todos los comentarios.
    Muestra una tabla con autor, texto, actividad asociada (y su destino) y fecha.
    Permite borrar comentarios desde aquí.
--}}
@extends('layouts.app')

@section('title', 'Listado de Comentarios')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Comentarios</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>Autor</th>
                <th>Comentario</th>
                <th>Actividad (Destino)</th>
                <th>Fecha</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td style="font-weight: bold; color: #2c3e50;">
                        {{ $comment->author }}
                    </td>

                    <td style="color: #666;">
                        {{ $comment->text }}
                    </td>

                    <td>
                        {{-- 
                            Accedo a la actividad del comentario y al destino de la actividad.
                            Esto funciona porque cargué 'activity.destination' en el controlador.
                        --}}
                        {{ $comment->activity->name }} 
                        ({{ $comment->activity->destination->name }})
                    </td>

                    <td style="color: #888; font-size: 0.9em;">
                        {{-- Formateo la fecha a formato español dd/mm/yyyy --}}
                        {{ $comment->created_at->format('d/m/Y') }}
                    </td>

                    <td class="text-center">
                        {{-- 
                            Formulario para borrar el comentario.
                            Uso @method('DELETE') porque HTML solo soporta GET y POST,
                            pero Laravel lo interpreta como DELETE gracias al _method oculto.
                        --}}
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="background-color: #e74c3c; color: white; border: none; cursor: pointer;" onclick="return confirm('¿Seguro que quieres borrar este comentario?')">
                                Borrar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
