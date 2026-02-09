{{-- 
    Vista del listado de tours.
    Cada tour muestra sus destinos y opciones para añadir/quitar destinos.
    La relación Tour <-> Destination es muchos a muchos.
--}}
@extends('layouts.app')

@section('title', 'Tours de Viaje')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <style>
        /* Estilos específicos para esta vista */
        .tours-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .tour-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            overflow: hidden;
        }
        .tour-header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 20px;
        }
        .tour-header h3 {
            margin: 0;
            font-size: 1.5em;
        }
        .tour-header span {
            font-size: 0.9em;
            opacity: 0.8;
        }
        .destinations-list {
            padding: 20px;
        }
        .destinations-list h4 {
            margin: 0 0 15px 0;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .destination-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 8px;
            background: #f8f9fa;
        }
        .destination-item:hover {
            background: #e9ecef;
        }
        .destination-flag {
            font-size: 1.2em;
            margin-right: 10px;
        }
        .destination-info {
            flex: 1;
        }
        .destination-name {
            font-weight: bold;
            color: #2c3e50;
        }
        .destination-country {
            font-size: 0.85em;
            color: #666;
        }
        .no-tours {
            text-align: center;
            color: #888;
            padding: 40px;
        }
        .btn-remove {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8em;
        }
        .btn-remove:hover {
            background: #c0392b;
        }
        .add-destination-form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #ddd;
        }
        .add-destination-form select {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-add {
            background: #27ae60;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-add:hover {
            background: #219a52;
        }
    </style>
@endpush

@section('content')
    <div class="tours-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2>Tours de Viaje</h2>
        </div>

        {{-- Recorro todos los tours. @forelse permite mostrar mensaje si está vacío --}}
        @forelse ($tours as $tour)
            <div class="tour-card">
                <div class="tour-header">
                    <h3>{{ $tour->name }}</h3>
                    {{-- Cuento los destinos del tour usando la relación --}}
                    <span>{{ $tour->destinations->count() }} destinos incluidos</span>
                </div>

                <div class="destinations-list">
                    <h4>Destinos del tour</h4>

                    {{-- Lista de destinos del tour --}}
                    @foreach ($tour->destinations as $destination)
                        <div class="destination-item">
                            <span class="destination-flag">📍</span>
                            <div class="destination-info">
                                <span class="destination-name">{{ $destination->name }}</span>
                                <span class="destination-country">{{ $destination->country }}</span>
                            </div>
                            
                            {{-- 
                                Formulario para QUITAR un destino del tour.
                                Paso ambos IDs (tour y destination) a la ruta.
                                Uso detach() en el controlador para quitar la relación.
                            --}}
                            <form action="{{ route('tours.removeDestination', [$tour, $destination]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-remove" onclick="return confirm('¿Quitar este destino del tour?')">
                                    Quitar
                                </button>
                            </form>
                        </div>
                    @endforeach

                    {{-- 
                        Formulario para AÑADIR un destino al tour.
                        El select muestra todos los destinos disponibles.
                        El controlador ya se encarga de evitar duplicados.
                    --}}
                    <form action="{{ route('tours.addDestination', $tour) }}" method="POST" class="add-destination-form">
                        @csrf
                        <select name="destination_id" required>
                            <option value="">-- Selecciona un destino --</option>
                            @foreach ($allDestinations as $dest)
                                <option value="{{ $dest->id }}">{{ $dest->name }} ({{ $dest->country }})</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-add">Añadir destino</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="no-tours">No hay tours disponibles.</p>
        @endforelse
    </div>
@endsection
