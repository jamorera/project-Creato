<?php

namespace Database\Seeders;

use App\Models\Insumo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Insumo::create([
            'descripcion' => 'puntilla 1 1/2',
            'tipo_unidad' => 'rollo',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 350,
            'valor_unitario' => 200
        ]);
        Insumo::create([
            'descripcion' => 'puntilla 1 1/3',
            'tipo_unidad' => 'rollo',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 350,
            'valor_unitario' => 200
        ]);
        Insumo::create([
            'descripcion' => 'puntilla 2',
            'tipo_unidad' => 'rollo',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 300,
            'valor_unitario' => 200
        ]);
        Insumo::create([
            'descripcion' => 'puntilla 2 1/2',
            'tipo_unidad' => 'rollo',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 300,
            'valor_unitario' => 200
        ]);
        Insumo::create([
            'descripcion' => 'puntilla 3',
            'tipo_unidad' => 'rollo',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 300,
            'valor_unitario' => 200
        ]);
        Insumo::create([
            'descripcion' => 'puntilla 3 1/2',
            'tipo_unidad' => 'rollo',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 300,
            'valor_unitario' => 200
        ]);
        Insumo::create([
            'descripcion' => 'grapa galvanizada 10mm',
            'tipo_unidad' => 'lamina',
            'proveedor' => 'senco',
            'cantidad_tipo_unidad' => 10,
            'valor_unitario' => 200
        ]);
    }
}
