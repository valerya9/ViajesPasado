<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

/**
 * Seeder para poblar la tabla de comentarios con datos de prueba.
 * Creo 10 comentarios repartidos entre 4 actividades diferentes.
 */
class CommentSeeder extends Seeder
{
    public function run(): void
    {
        // Array con todos los comentarios que voy a crear
        // Cada comentario tiene: texto, autor y el ID de la actividad
        $comments = [
            // --- Comentarios para la actividad 1 ---
            [
                'text' => 'Una experiencia increíble, lo recomiendo totalmente. El guía fue muy amable.',
                'author' => 'María García',
                'activity_id' => 1,
            ],
            [
                'text' => 'Muy bien organizado, aunque el precio me pareció un poco alto.',
                'author' => 'Carlos López',
                'activity_id' => 1,
            ],
            [
                'text' => 'Perfecto para ir en familia, mis hijos lo disfrutaron mucho.',
                'author' => 'Ana Martínez',
                'activity_id' => 1,
            ],

            // --- Comentarios para la actividad 2 ---
            [
                'text' => 'Las vistas eran espectaculares, merece la pena cada euro.',
                'author' => 'Pedro Sánchez',
                'activity_id' => 2,
            ],
            [
                'text' => 'Buen servicio pero la duración se quedó un poco corta.',
                'author' => 'Laura Fernández',
                'activity_id' => 2,
            ],
            [
                'text' => 'Repetiría sin dudarlo, una pasada de actividad.',
                'author' => 'Javier Ruiz',
                'activity_id' => 2,
            ],

            // --- Comentarios para la actividad 3 ---
            [
                'text' => 'No estuvo mal, pero esperaba algo más emocionante.',
                'author' => 'Elena Torres',
                'activity_id' => 3,
            ],
            [
                'text' => 'El monitor explicó todo muy bien, aprendí mucho.',
                'author' => 'Miguel Ángel Díaz',
                'activity_id' => 3,
            ],

            // --- Comentarios para la actividad 4 ---
            [
                'text' => 'Increíble, la mejor actividad que he hecho en mis vacaciones.',
                'author' => 'Sofía Romero',
                'activity_id' => 4,
            ],
            [
                'text' => 'Muy recomendable para los más aventureros.',
                'author' => 'David Moreno',
                'activity_id' => 4,
            ],
        ];

        // Recorro el array y creo cada comentario en la BD
        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
