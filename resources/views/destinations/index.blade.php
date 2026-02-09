{{-- Vista del listado de destinos --}}
@extends('layouts.app')

@section('title', 'Nuestros Destinos')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <h2>Explora el Mundo</h2>
        <a href="" class="btn-new">
            + Nuevo Destino
        </a>
    </div>

    <div class="destinations-grid">
        @foreach ($destinations as $destination)
            <article class="card">
                <div class="card-image">
                    <img src="/images/{{ $destination->image ?? 'none.jpg' }}" 
                         alt="{{ $destination->name }}">
                    <span class="card-badge">{{ $destination->country }}</span>
                </div>

                <div class="card-content">
                    <h3>{{ $destination->name }}</h3>
                    <p class="description">
                        {{ Str::limit($destination->description, 80) }}
                    </p>
                    
                    {{-- 
                        Enlace al listado de actividades filtrado por este destino.
                        Uso route() con el nombre de la ruta y paso el destino como parámetro.
                        Laravel automáticamente usa el ID del destino en la URL.
                    --}}
                    <p class="activities">
                        <a href="{{ route('destinations.activities', $destination) }}">
                            {{ count($destination->activities) }} actividades
                        </a>
                    </p>
                    
                    <div class="card-actions">
                        <a href="" class="btn btn-view">Ver Detalles</a>
                        
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection