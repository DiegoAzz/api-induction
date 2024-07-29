<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promocion;

class PromocionSeeder extends Seeder
{
    public function run()
    {
        Promocion::create([
            'oferta' => 'Descuento del 20% en cortes de pelo',
            'fecha_inicio' => '2024-07-01',
            'fecha_final' => '2024-07-15',
        ]);

        Promocion::create([
            'oferta' => '2x1 en servicios de manicure',
            'fecha_inicio' => '2024-07-10',
            'fecha_final' => '2024-07-20',
        ]);
    }
}
