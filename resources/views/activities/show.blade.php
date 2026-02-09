{{-- 
    Vista de detalle de una actividad.
    Muestra toda la información de la actividad, sus comentarios
    y un formulario para añadir nuevos comentarios.
--}}
@extends('layouts.app')

@section('title', $activity->name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <style>
        .activity-detail {
            max-width: 800px;
            margin: 0 auto;
        }
        .activity-header {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .activity-header h2 {
            margin: 0 0 10px 0;
        }
        .activity-meta {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        .activity-meta span {
            background: rgba(255,255,255,0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .activity-description {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .comments-section h3 {
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .comment-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #666;
            font-size: 0.9em;
        }
        .comment-author {
            font-weight: bold;
            color: #2c3e50;
        }
        .comment-text {
            color: #444;
            line-height: 1.5;
        }
        .no-comments {
            color: #888;
            font-style: italic;
            text-align: center;
            padding: 20px;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #3498db;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        /* Estilos del formulario de comentarios */
        .comment-form {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }
        .comment-form h4 {
            margin: 0 0 15px 0;
            color: #2c3e50;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
        }
        .btn-submit {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .btn-submit:hover {
            background: #2980b9;
        }
    </style>
@endpush

@section('content')
    <div class="activity-detail">
        <a href="{{ route('activities.index') }}" class="back-link">← Volver al listado</a>

        {{-- Cabecera con info principal --}}
        <div class="activity-header">
            <h2>{{ $activity->name }}</h2>
            <p>{{ $activity->destination->name }} - {{ $activity->destination->country }}</p>
            
            <div class="activity-meta">
                <span>⏱ {{ $activity->duration }} minutos</span>
                <span>💰 {{ number_format($activity->price, 2) }}€</span>
                <span>💬 {{ $activity->comments->count() }} comentarios</span>
            </div>
        </div>

        {{-- Descripción --}}
        <div class="activity-description">
            <h3>Descripción</h3>
            <p>{{ $activity->description }}</p>
        </div>

        {{-- Sección de comentarios --}}
        <div class="comments-section">
            <h3>Comentarios ({{ $activity->comments->count() }})</h3>

            @forelse ($activity->comments as $comment)
                <div class="comment-card">
                    <div class="comment-header">
                        <span class="comment-author">{{ $comment->author }}</span>
                        <span>{{ $comment->created_at->format('d/m/Y') }}</span>
                    </div>
                    <p class="comment-text">{{ $comment->text }}</p>
                </div>
            @empty
                <p class="no-comments">Esta actividad aún no tiene comentarios.</p>
            @endforelse

            {{-- 
                Formulario para añadir un nuevo comentario.
                El activity_id va en un campo oculto porque ya sabemos
                a qué actividad pertenece (es la que estamos viendo).
            --}}
            <div class="comment-form">
                <h4>Añadir un comentario</h4>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    {{-- Campo oculto con el ID de la actividad --}}
                    <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                    
                    <div class="form-group">
                        <label for="author">Tu nombre</label>
                        <input type="text" name="author" id="author" required placeholder="Escribe tu nombre...">
                    </div>

                    <div class="form-group">
                        <label for="text">Comentario</label>
                        <textarea name="text" id="text" rows="3" required placeholder="Escribe tu comentario..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Enviar comentario</button>
                </form>
            </div>
        </div>
    </div>
@endsection
