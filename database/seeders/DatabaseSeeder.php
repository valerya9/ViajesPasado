<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Seeder principal que llama a todos los demás seeders.
 * Se ejecuta con: php artisan db:seed
 * O con: php artisan migrate:fresh --seed (para recrear todo)
 */
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        /*
         * Llamo a los seeders en orden.
         * IMPORTANTE: El orden importa por las foreign keys.
         * Primero destinos, luego actividades (que dependen de destinos),
         * luego comentarios (que dependen de actividades),
         * y finalmente tours (que necesitan destinos para las relaciones).
         */
        $this->call([
            DestinationSeeder::class,
            ActivitySeeder::class,
            CommentSeeder::class,
            TourSeeder::class,
        ]);
    }
}
