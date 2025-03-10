<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        $empresas = [
            'DHL Express',
            'FedEx',
            'UPS',
            'Cargo Expreso',
            'Honducor',
            'Tigo Logistics',
            'Claro Envios',
            'Amazon Logistics'
        ];

        $departamentos = [
            'AT', // Atlántida
            'CH', // Choluteca
            'CL', // Colón
            'CM', // Comayagua
            'CP', // Copán
            'CR', // Cortés
            'EP', // El Paraíso
            'FM', // Francisco Morazán
            'GD', // Gracias a Dios
            'IN', // Intibucá
            'IB', // Islas de la Bahía
            'LB', // La Paz
            'LE', // Lempira
            'OC', // Ocotepeque
            'OL', // Olancho
            'SB', // Santa Bárbara
            'VA', // Valle
            'YO', // Yoro
        ];

        $status = ['En Ruta', 'Completado', 'Pendiente', 'Cancelado'];

        for ($i = 0; $i < 15; $i++) {
            DB::table('deliveries')->insert([
                'empresa' => $faker->randomElement($empresas),
                'tracking' => '#' . strtoupper($faker->bothify('########')),
                'motorista' => $faker->firstName . ' ' . $faker->lastName,
                'origen' => $faker->randomElement($departamentos) . '-' . $faker->numberBetween(1000, 9999),
                'vehiculo' => $faker->numberBetween(100, 999),
                'fecha' => $faker->dateTimeBetween('2025-02-15', '2025-03-12')->format('Y-m-d'),
                'staus' => $faker->randomElement($status),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
