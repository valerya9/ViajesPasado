{{-- 
    Vista del listado de actividades.
    Esta vista se usa tanto para mostrar TODAS las actividades
    como para mostrar las actividades filtradas por destino.
    La variable $activities viene del controlador.
--}}
@extends('layouts.app')

@section('title', 'Listado de Actividades')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Actividades Disponibles</h2>
        <a href="" class="btn-new">
            + Nueva Actividad
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Actividad</th>
                <th>Destino</th>
                <th>Descripción</th>
                <th class="text-right">Duración</th>
                <th class="text-right">Precio</th>
                <th class="text-center">Comentarios</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    <td style="font-weight: bold; color: #2c3e50;">
                        {{ $activity->name }}
                    </td>

                    {{-- Accedo al destino a través de la relación del modelo --}}
                    <td>
                        {{ $activity->destination->name }}
                    </td>

                    <td style="color: #666; font-size: 0.9em;">
                        {{-- Str::limit recorta el texto a 50 caracteres --}}
                        {{ Str::limit($activity->description, 50) }}
                    </td>

                    <td class="text-right">
                        {{ $activity->duration }} min
                    </td>

                    <td class="text-right" style="font-weight: bold;">
                        {{-- number_format formatea el precio con 2 decimales --}}
                        {{ number_format($activity->price, 2) }}€
                    </td>

                    {{-- Columna de comentarios: muestro el contador --}}
                    <td class="text-center">
                        {{ $activity->comments->count() }}
                    </td>

                    <td class="text-center">
                        {{-- Enlace a la vista de detalle de la actividad --}}
                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm" style="background-color: #3498db; color: white;">Ver</a>
                        
                        <a href="" class="btn btn-sm" style="background-color: #f39c12; color: white;">Editar</a>


                            <button type="submit" class="btn btn-sm" style="background-color: #e74c3c; color: white; border: none; cursor: pointer;" onclick="return confirm('¿Estás seguro de querer eliminar esta actividad?')">
                                Borrar
                            </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection