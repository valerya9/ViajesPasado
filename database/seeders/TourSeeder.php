<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder para poblar la tabla de tours y la tabla pivote destination_tour.
 * Creo 4 tours y asigno destinos a cada uno.
 * Algunos destinos están en varios tours (relación muchos a muchos).
 */
class TourSeeder extends Seeder
{
    public function run(): void
    {
        // Primero creo los tours
        $tours = [
            ['name' => 'Capitales europeas'],
            ['name' => 'Lo mejor de Tenerife'],
            ['name' => 'Italia maravillosa'],
            ['name' => 'Francia mágica'],
        ];

        foreach ($tours as $tour) {
            Tour::create($tour);
        }

        /*
         * Ahora creo las relaciones tour-destino.
         * Esto se guarda en la tabla pivote 'destination_tour'.
         * 
         * Nota: Los destinos 2 y 3 están en varios tours,
         * lo cual demuestra la relación muchos a muchos.
         */
        $relations = [
            // Tour 1: Capitales europeas - destinos del 1 al 10
            ['tour_id' => 1, 'destination_id' => 1],
            ['tour_id' => 1, 'destination_id' => 2],
            ['tour_id' => 1, 'destination_id' => 3],
            ['tour_id' => 1, 'destination_id' => 4],
            ['tour_id' => 1, 'destination_id' => 5],
            ['tour_id' => 1, 'destination_id' => 6],
            ['tour_id' => 1, 'destination_id' => 7],
            ['tour_id' => 1, 'destination_id' => 8],
            ['tour_id' => 1, 'destination_id' => 9],
            ['tour_id' => 1, 'destination_id' => 10],

            // Tour 2: Lo mejor de Tenerife
            ['tour_id' => 2, 'destination_id' => 11],
            ['tour_id' => 2, 'destination_id' => 12],
            ['tour_id' => 2, 'destination_id' => 13],
            ['tour_id' => 2, 'destination_id' => 14],
            ['tour_id' => 2, 'destination_id' => 15],
            ['tour_id' => 2, 'destination_id' => 16],
            ['tour_id' => 2, 'destination_id' => 20],

            // Tour 3: Italia maravillosa
            // El destino 3 ya está en el tour 1 (compartido)
            ['tour_id' => 3, 'destination_id' => 3],
            ['tour_id' => 3, 'destination_id' => 23],

            // Tour 4: Francia mágica
            // El destino 2 ya está en el tour 1 (compartido)
            ['tour_id' => 4, 'destination_id' => 2],
            ['tour_id' => 4, 'destination_id' => 21],
        ];

        // Inserto todas las relaciones en la tabla pivote
        DB::table('destination_tour')->insert($relations);
    }
}
