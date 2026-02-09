<?php

namespace Database\Seeders;

use App\Models\Guides;
use App\Models\Destination;
use Illuminate\Database\Seeder;

class GuidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $destinations = Destination::pluck('id', 'name');

        Guides::insert([
            [
                'name' => "pepe",
                'email' => "pepe@pepon.es",
                'destination_id' => $destinations['Madrid'] ?? null
            ],
            [
                'name' => "juan",
                'email' => "juan@juanito.es",
                'destination_id' => $destinations['Roma'] ?? null
            ]

        ]);
    }
}
