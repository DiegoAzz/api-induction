<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombres' => 'Juan Pérez',
            'nit' => '123456789',
            'direccion' => 'Calle Falsa 123',
            'email' => 'juan@example.com',
            'telefono' => '555-1234',
        ]);

        Cliente::create([
            'nombres' => 'María López',
            'nit' => '987654321',
            'direccion' => 'Avenida Siempre Viva 456',
            'email' => 'maria@example.com',
            'telefono' => '555-5678',
        ]);
    }
}
