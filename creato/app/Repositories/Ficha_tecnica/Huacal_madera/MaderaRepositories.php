<?php

namespace App\Repositories\Ficha_tecnica\Huacal_madera;

use App\Models\Madera_lamina;

class MaderaRepositories
{
    protected $selectMadera =["largo","ancho","espesor","valor_unitario"];

    public function execute($data){
        $bloque_base = Madera_lamina::findOrFail($data['bloque_base'],$this->selectMadera);
        $tabla_base = Madera_lamina::findOrFail($data['tabla_base'],$this->selectMadera);
        $liston_costados = Madera_lamina::findOrFail($data['liston_costados'],$this->selectMadera);
        $tabla_costados = Madera_lamina::findOrFail($data['tabla_costados'],$this->selectMadera);

        return  [
            'bloque_base' => $bloque_base,
            'tabla_base' => $tabla_base,
            'liston_costados' => $liston_costados,
            'tabla_costados' => $tabla_costados,
        ];
    }

}