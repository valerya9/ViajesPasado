<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::insert([
            [
                'name' => 'Madrid',
                'country' => 'España',
                'image' => 'madrid.jpg',
                'description' => 'Capital de España, conocida por su vida cultural y gastronómica.'
            ],
            [
                'name' => 'París',
                'country' => 'Francia',
                'image' => 'paris.jpg',
                'description' => 'Capital francesa famosa por su arte, moda y monumentos icónicos.'
            ],
            [
                'name' => 'Roma',
                'country' => 'Italia',
                'image' => 'roma.jpg',
                'description' => 'Capital italiana con un enorme patrimonio histórico y arquitectónico.'
            ],
            [
                'name' => 'Berlín',
                'country' => 'Alemania',
                'image' => 'berlin.jpg',
                'description' => 'Capital alemana, moderna y vibrante, con una historia marcada por el siglo XX.'
            ],
            [
                'name' => 'Lisboa',
                'country' => 'Portugal',
                'image' => 'lisboa.jpg',
                'description' => 'Capital de Portugal, conocida por su encanto costero y barrios tradicionales.'
            ],
            [
                'name' => 'Ámsterdam',
                'country' => 'Países Bajos',
                'image' => null,
                'description' => 'Capital neerlandesa famosa por sus canales y ambiente multicultural.'
            ],
            [
                'name' => 'Bruselas',
                'country' => 'Bélgica',
                'image' => 'bruselas.jpg',
                'description' => 'Capital de Bélgica y sede de instituciones europeas.'
            ],
            [
                'name' => 'Viena',
                'country' => 'Austria',
                'image' => 'vienna.jpg',
                'description' => 'Capital austríaca reconocida por su música clásica y arquitectura imperial.'
            ],
            [
                'name' => 'Copenhague',
                'country' => 'Dinamarca',
                'image' => 'La-Sirenita.jpg',
                'description' => 'Capital danesa, moderna y sostenible, con un estilo de vida relajado.'
            ],
            [
                'name' => 'Atenas',
                'country' => 'Grecia',
                'image' => 'athens.jpg',
                'description' => 'Capital de Grecia, cuna de la civilización occidental y la democracia.'
            ],
            [
                'name' => 'Arona',
                'country' => 'España',
                'image' => 'arona.jpg',
                'description' => 'Municipio del sur de Tenerife conocido por sus playas, clima cálido y zonas turísticas como Los Cristianos.'
            ],
            [
                'name' => 'Santa Cruz de Tenerife',
                'country' => 'España',
                'image' => 'santa-cruz.jpg',
                'description' => 'Capital de la isla, famosa por su carnaval, su puerto y su ambiente cultural.'
            ],
            [
                'name' => 'La Laguna',
                'country' => 'España',
                'image' => 'laguna.jpg',
                'description' => 'Ciudad Patrimonio de la Humanidad, con un casco histórico colonial único en Canarias.'
            ],
            [
                'name' => 'Puerto de la Cruz',
                'country' => 'España',
                'image' => 'puerto-de-la-cruz.jpg',
                'description' => 'Destino turístico del norte con jardines, playas volcánicas y el famoso Lago Martiánez.'
            ],
            [
                'name' => 'Los Gigantes',
                'country' => 'España',
                'image' => 'gigantes-tenerife.jpg',
                'description' => 'Zona costera conocida por sus impresionantes acantilados de hasta 600 metros de altura.'
            ],
            [
                'name' => 'El Médano',
                'country' => 'España',
                'image' => 'medano.jpg',
                'description' => 'Pueblo costero popular entre surfistas y amantes del viento, con una de las mejores playas naturales de la isla.'
            ],
            [
                'name' => 'La Orotava',
                'country' => 'España',
                'image' => 'La-Orotava.jpg',
                'description' => 'Municipio histórico con arquitectura tradicional canaria y acceso al Parque Nacional del Teide.'
            ],
            [
                'name' => 'Icod de los Vinos',
                'country' => 'España',
                'image' => 'icod.jpg',
                'description' => 'Hogar del famoso Drago Milenario y conocido por sus vinos y paisajes volcánicos.'
            ],
            [
                'name' => 'Garachico',
                'country' => 'España',
                'image' => null,
                'description' => 'Pueblo costero con piscinas naturales formadas por lava y un casco histórico encantador.'
            ],
            [
                'name' => 'Parque Nacional del Teide',
                'country' => 'España',
                'image' => 'teide.jpg',
                'description' => 'El lugar más emblemático de Tenerife, con el volcán Teide, el pico más alto de España.'
            ],
            [
                'name' => 'Versalles',
                'country' => 'Francia',
                'image' => 'palacio-versalles-paris.jpg',
                'description' => 'Ciudad cercana a París, famosa por su palacio y jardines reales.'
            ],
            [
                'name' => 'Toledo',
                'country' => 'España',
                'image' => 'toledo.jpg',
                'description' => 'Ciudad histórica cerca de Madrid, conocida por su patrimonio medieval.'
            ],
            [
                'name' => 'Tivoli',
                'country' => 'Italia',
                'image' => null,
                'description' => 'Localidad cercana a Roma, famosa por Villa Adriana y Villa d’Este.'
            ],
            [
                'name' => 'Potsdam',
                'country' => 'Alemania',
                'image' => null,
                'description' => 'Ciudad cercana a Berlín, conocida por los palacios y jardines de Sanssouci.'
            ],
            [
                'name' => 'Sintra',
                'country' => 'Portugal',
                'image' => null,
                'description' => 'Destino cercano a Lisboa, famoso por sus palacios y paisajes verdes.'
            ],
            [
                'name' => 'Brujas',
                'country' => 'Bélgica',
                'image' => 'ciudad-de-brujas.jpg',
                'description' => 'Ciudad medieval muy visitada, a poca distancia de Bruselas.'
            ],
            [
                'name' => 'Haarlem',
                'country' => 'Países Bajos',
                'image' => null,
                'description' => 'Ciudad cercana a Ámsterdam, conocida por su arquitectura y museos.'
            ],
            [
                'name' => 'Salzburgo',
                'country' => 'Austria',
                'image' => 'Kapitelplatz.jpg',
                'description' => 'Ciudad histórica cerca de Viena, famosa por Mozart y su casco antiguo.'
            ],
            [
                'name' => 'Malmö',
                'country' => 'Suecia',
                'image' => null,
                'description' => 'Ciudad conectada con Copenhague por el puente de Øresund, moderna y multicultural.'
            ],
            [
                'name' => 'Delfos',
                'country' => 'Grecia',
                'image' => 'delfos.jpg',
                'description' => 'Sitio arqueológico cercano a Atenas, conocido por su antiguo oráculo.'
            ]
        ]);
    }
}
