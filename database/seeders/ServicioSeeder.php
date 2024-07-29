<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    public function run()
    {
        Servicio::create([
            'producto_servicio' => 'Corte de pelo',
            'descripcion' => 'Corte de pelo para hombre y mujer',
            'precio' => 15.00,
        ]);

        Servicio::create([
            'producto_servicio' => 'Manicure',
            'descripcion' => 'Servicio de manicure profesional',
            'precio' => 20.00,
        ]);
    }
}
