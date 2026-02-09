<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Destination;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Recuperamos los IDs de los destinos existentes para asignarlos correctamente
        // Esto crea un array asociativo tipo: ['Madrid' => 1, 'París' => 2, ...]
        $destinations = Destination::pluck('id', 'name');

        // 2. Definimos el array masivo para la inserción (Bulk Insert)
        // Nota: Al usar insert(), los timestamps (created_at) no se generan solos. 
        // Si tu base de datos los requiere, deberías añadirlos o usar create() en bucle.
        // Siguiendo tu ejemplo de DestinationSeeder, los omitimos.
        
        $activities = [
            // --- ESPAÑA ---
            [
                'name' => 'Visita Guiada al Museo del Prado',
                'description' => 'Recorrido cultural por las obras maestras de Goya, Velázquez y El Greco.',
                'price' => 30.00,
                'duration' => 120,
                'destination_id' => $destinations['Madrid'] ?? null,
            ],
            [
                'name' => 'Ruta de Tapas por La Latina',
                'description' => 'Experiencia gastronómica probando las mejores tapas y vinos locales.',
                'price' => 55.00,
                'duration' => 180,
                'destination_id' => $destinations['Madrid'] ?? null,
            ],
            [
                'name' => 'Paseo en barca por El Retiro',
                'description' => 'Relajante paseo en barca por el estanque del parque más famoso de Madrid.',
                'price' => 8.00,
                'duration' => 60,
                'destination_id' => $destinations['Madrid'] ?? null,
            ],
            [
                'name' => 'Avistamiento de Cetáceos',
                'description' => 'Excursión en barco ecológico para ver delfines y ballenas en libertad.',
                'price' => 45.00,
                'duration' => 180,
                'destination_id' => $destinations['Arona'] ?? null,
            ],
            [
                'name' => 'Clase de Surf en Las Américas',
                'description' => 'Aprende a surfear en una de las mejores zonas de olas de Canarias.',
                'price' => 40.00,
                'duration' => 120,
                'destination_id' => $destinations['Arona'] ?? null,
            ],
            [
                'name' => 'Tour del Auditorio Adán Martín',
                'description' => 'Visita arquitectónica al emblemático edificio diseñado por Calatrava.',
                'price' => 10.00,
                'duration' => 60,
                'destination_id' => $destinations['Santa Cruz de Tenerife'] ?? null,
            ],
            [
                'name' => 'Caminata por el Palmetum',
                'description' => 'Paseo botánico por la mayor colección de palmeras de Europa.',
                'price' => 6.00,
                'duration' => 90,
                'destination_id' => $destinations['Santa Cruz de Tenerife'] ?? null,
            ],
            [
                'name' => 'Ruta Histórica Ciudad Patrimonio',
                'description' => 'Paseo guiado por las calles coloniales y patios canarios.',
                'price' => 12.00,
                'duration' => 90,
                'destination_id' => $destinations['La Laguna'] ?? null,
            ],
            [
                'name' => 'Ruta de los Fantasmas',
                'description' => 'Tour nocturno de misterio y leyendas de la ciudad.',
                'price' => 15.00,
                'duration' => 90,
                'destination_id' => $destinations['La Laguna'] ?? null,
            ],
            [
                'name' => 'Kayak bajo los Acantilados',
                'description' => 'Ruta deportiva en kayak admirando las paredes verticales de 600m.',
                'price' => 35.00,
                'duration' => 150,
                'destination_id' => $destinations['Los Gigantes'] ?? null,
            ],
            [
                'name' => 'Curso de Kitesurf',
                'description' => 'Iniciación al kitesurf en la playa con más viento de Tenerife.',
                'price' => 70.00,
                'duration' => 120,
                'destination_id' => $destinations['El Médano'] ?? null,
            ],
            [
                'name' => 'Senderismo Montaña Roja',
                'description' => 'Ruta guiada al amanecer por la reserva natural volcánica.',
                'price' => 20.00,
                'duration' => 120,
                'destination_id' => $destinations['El Médano'] ?? null,
            ],
            [
                'name' => 'Teleférico al Atardecer',
                'description' => 'Subida al pico más alto de España para ver la puesta de sol.',
                'price' => 40.00,
                'duration' => 90,
                'destination_id' => $destinations['Parque Nacional del Teide'] ?? null,
            ],
            [
                'name' => 'Observación Astronómica',
                'description' => 'Taller de estrellas con telescopios profesionales en uno de los cielos más limpios.',
                'price' => 35.00,
                'duration' => 150,
                'destination_id' => $destinations['Parque Nacional del Teide'] ?? null,
            ],
            [
                'name' => 'Trekking Roques de García',
                'description' => 'Ruta de senderismo circular entre formaciones de lava.',
                'price' => 0.00,
                'duration' => 120,
                'destination_id' => $destinations['Parque Nacional del Teide'] ?? null,
            ],
            [
                'name' => 'Catedral Primada y Sinagoga',
                'description' => 'Visita cultural a los monumentos de las tres culturas.',
                'price' => 25.00,
                'duration' => 180,
                'destination_id' => $destinations['Toledo'] ?? null,
            ],
            [
                'name' => 'Tirolina Urbana',
                'description' => 'Vuelo escénico cruzando el río Tajo.',
                'price' => 10.00,
                'duration' => 30,
                'destination_id' => $destinations['Toledo'] ?? null,
            ],

            // --- FRANCIA ---
            [
                'name' => 'Entrada al Museo del Louvre',
                'description' => 'Acceso rápido para ver la Mona Lisa y antigüedades egipcias.',
                'price' => 22.00,
                'duration' => 240,
                'destination_id' => $destinations['París'] ?? null,
            ],
            [
                'name' => 'Crucero por el Sena',
                'description' => 'Paseo romántico en barco viendo la Torre Eiffel iluminada.',
                'price' => 18.00,
                'duration' => 60,
                'destination_id' => $destinations['París'] ?? null,
            ],
            [
                'name' => 'Cata de Quesos y Vinos',
                'description' => 'Experiencia gastronómica en el barrio Latino.',
                'price' => 65.00,
                'duration' => 120,
                'destination_id' => $destinations['París'] ?? null,
            ],
            [
                'name' => 'Palacio y Jardines de Versalles',
                'description' => 'Visita completa a la residencia de Luis XIV y sus fuentes musicales.',
                'price' => 30.00,
                'duration' => 300,
                'destination_id' => $destinations['Versalles'] ?? null,
            ],

            // --- ITALIA ---
            [
                'name' => 'Tour Coliseo y Foro Romano',
                'description' => 'Viaje a la antigua Roma con acceso a la arena de gladiadores.',
                'price' => 45.00,
                'duration' => 180,
                'destination_id' => $destinations['Roma'] ?? null,
            ],
            [
                'name' => 'Clase de Cocina: Pizza y Gelato',
                'description' => 'Aprende a hacer auténtica comida italiana con un chef local.',
                'price' => 55.00,
                'duration' => 120,
                'destination_id' => $destinations['Roma'] ?? null,
            ],
            [
                'name' => 'Visita Museos Vaticanos',
                'description' => 'Entrada a la Capilla Sixtina y la Basílica de San Pedro.',
                'price' => 35.00,
                'duration' => 150,
                'destination_id' => $destinations['Roma'] ?? null,
            ],

            // --- ALEMANIA ---
            [
                'name' => 'Tour del Muro de Berlín en Bici',
                'description' => 'Recorrido deportivo e histórico por los restos del muro.',
                'price' => 25.00,
                'duration' => 180,
                'destination_id' => $destinations['Berlín'] ?? null,
            ],
            [
                'name' => 'Subida a la Torre de TV',
                'description' => 'Vistas panorámicas 360 grados de la ciudad.',
                'price' => 24.50,
                'duration' => 60,
                'destination_id' => $destinations['Berlín'] ?? null,
            ],

            // --- PORTUGAL ---
            [
                'name' => 'Espectáculo de Fado con Cena',
                'description' => 'Noche cultural con música tradicional portuguesa y bacalao.',
                'price' => 50.00,
                'duration' => 180,
                'destination_id' => $destinations['Lisboa'] ?? null,
            ],
            [
                'name' => 'Ruta del Tranvía 28',
                'description' => 'Recorrido pintoresco por las colinas y barrios antiguos.',
                'price' => 3.00,
                'duration' => 45,
                'destination_id' => $destinations['Lisboa'] ?? null,
            ],
            [
                'name' => 'Pasteles de Belém',
                'description' => 'Visita gastronómica a la famosa pastelería y al Monasterio.',
                'price' => 15.00,
                'duration' => 90,
                'destination_id' => $destinations['Lisboa'] ?? null,
            ],

            // --- BÉLGICA ---
            [
                'name' => 'Ruta de la Cerveza Belga',
                'description' => 'Cata de cervezas trapenses en tabernas históricas.',
                'price' => 35.00,
                'duration' => 150,
                'destination_id' => $destinations['Bruselas'] ?? null,
            ],
            [
                'name' => 'Visita al Atomium',
                'description' => 'Entrada al icono de la arquitectura moderna de Bruselas.',
                'price' => 16.00,
                'duration' => 90,
                'destination_id' => $destinations['Bruselas'] ?? null,
            ],
            [
                'name' => 'Paseo en barca por los canales',
                'description' => 'Descubre la Venecia del norte desde el agua.',
                'price' => 12.00,
                'duration' => 30,
                'destination_id' => $destinations['Brujas'] ?? null,
            ],
            [
                'name' => 'Taller de Chocolate',
                'description' => 'Aprende a crear tus propios bombones belgas.',
                'price' => 30.00,
                'duration' => 90,
                'destination_id' => $destinations['Brujas'] ?? null,
            ],

            // --- AUSTRIA ---
            [
                'name' => 'Concierto de Mozart y Strauss',
                'description' => 'Velada de música clásica en una sala de conciertos histórica.',
                'price' => 75.00,
                'duration' => 120,
                'destination_id' => $destinations['Viena'] ?? null,
            ],
            [
                'name' => 'Palacio de Schönbrunn',
                'description' => 'Visita imperial a la residencia de verano de Sisi.',
                'price' => 28.00,
                'duration' => 150,
                'destination_id' => $destinations['Viena'] ?? null,
            ],
            [
                'name' => 'Tour Sonrisas y Lágrimas',
                'description' => 'Visita a las localizaciones de la famosa película musical.',
                'price' => 40.00,
                'duration' => 240,
                'destination_id' => $destinations['Salzburgo'] ?? null,
            ],

            // --- GRECIA ---
            [
                'name' => 'Entrada a la Acrópolis',
                'description' => 'Visita al Partenón y los templos antiguos.',
                'price' => 20.00,
                'duration' => 120,
                'destination_id' => $destinations['Atenas'] ?? null,
            ],
            [
                'name' => 'Museo Arqueológico Nacional',
                'description' => 'La colección más importante de arte griego antiguo.',
                'price' => 15.00,
                'duration' => 120,
                'destination_id' => $destinations['Atenas'] ?? null,
            ],
            [
                'name' => 'Santuario de Apolo',
                'description' => 'Excursión histórica al ombligo del mundo antiguo.',
                'price' => 18.00,
                'duration' => 150,
                'destination_id' => $destinations['Delfos'] ?? null,
            ]
        ];

        // 3. Ejecutamos la inserción masiva
        // Filtramos para evitar errores si algún destino no se encontró (id null)
        $activities = array_filter($activities, fn($a) => !is_null($a['destination_id']));
        
        Activity::insert($activities);
    }
}