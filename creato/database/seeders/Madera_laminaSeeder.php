<?php

namespace Database\Seeders;

use App\Models\Madera_lamina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Madera_laminaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Madera_lamina::create([
            'descripcion' => 'tabla 300-15-1.6',
            'tipo' => 'tabla',
            'largo' => 300,
            'ancho' => 14.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'tabla 300-15-2',
            'tipo' => 'tabla',
            'largo' => 300,
            'ancho' => 14.5,
            'espesor' => 1.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'tabla 300-15-3',
            'tipo' => 'tabla',
            'largo' => 300,
            'ancho' => 14.5,
            'espesor' => 2.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'tabla 300-15-4',
            'tipo' => 'tabla',
            'largo' => 300,
            'ancho' => 14.5,
            'espesor' => 3.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 300-9-1.6',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 300-9-2',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 1.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'repisa 300-9-3',
            'tipo' => 'repisa',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 2.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'repisa 300-9-4',
            'tipo' => 'repisa',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 3.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'repisa 300-10-6',
            'tipo' => 'repisa',
            'largo' => 300,
            'ancho' => 9.5,
            'espesor' => 5.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'bloque 300-9-9',
            'tipo' => 'bloque',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 8.5,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'bloque 300-10-10',
            'tipo' => 'bloque',
            'largo' => 300,
            'ancho' => 9.5,
            'espesor' => 9.5,
            'valor_unitario' => 400,
        ]);       
        Madera_lamina::create([
            'descripcion' => 'liston 250-9-1.6',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 250-9-2',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 1.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'repisa 250-9-3',
            'tipo' => 'repisa',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 2.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'repisa 250-10-6',
            'tipo' => 'repisa',
            'largo' => 250,
            'ancho' => 9.5,
            'espesor' => 5.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 200-9-1.6',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 200-9-2',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 8.5,
            'espesor' => 1.8,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 300-7-1.6',
            'tipo' => 'liston',
            'largo' => 300,
            'ancho' => 6.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 250-7-1.6',
            'tipo' => 'liston',
            'largo' => 250,
            'ancho' => 6.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'liston 200-7-1.6',
            'tipo' => 'liston',
            'largo' => 200,
            'ancho' => 6.5,
            'espesor' => 1.4,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'triplex 244-200-0.04',
            'tipo' => 'triplex',
            'largo' => 244,
            'ancho' => 200,
            'espesor' => 0.04,
            'valor_unitario' => 400,
        ]);
        Madera_lamina::create([
            'descripcion' => 'carton 244-200-0.5',
            'tipo' => 'carton',
            'largo' => 244,
            'ancho' => 200,
            'espesor' => 0.5,
            'valor_unitario' => 400,
        ]);
    }
}
