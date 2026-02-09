@extends('layouts.app')

@section('title', 'Nuestros Guias')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endpush

@section('content')

    <div class="guides-grid">
<table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Destino</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guides as $guide)
                <tr>
                    <td style="font-weight: bold; color: #2c3e50;">
                        {{ $guide->name }}
                    </td>

                    <td style="font-weight: bold; color: #2c3e50;">
                        {{ $guide->email }}
                    </td>

                    {{-- Accedo al destino a través de la relación del modelo --}}
                    <td>
                        {{ $guide->destination->name }}
                    </td>

                    <td class="text-center">
                            <button type="" class="btn-new" style="background-color: #3ce745; color: white; border: none; cursor: pointer;">
                                Registrar nuevo guía
                            </button>

                        <form action="{{ route('guides.destroy', $guide) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="background-color: #e74c3c; color: white; border: none; cursor: pointer;" onclick="return confirm('¿Seguro que quieres borrar este comentario?')">
                                Eliminar
                            </button>
                        </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection