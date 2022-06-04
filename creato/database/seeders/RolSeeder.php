<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
                'nombre' => 'Admin',
                'estado' => '1'
        ]);
        Rol::create([
                'nombre' => 'User',
                'estado' => '1'
        ]);
        Rol::create([
                'nombre' => 'Guest',
                'estado' => '1'
        ]);
    }
}
