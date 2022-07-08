<?php

namespace App\Repositories\Ficha_tecnica\InfoMateriaPrima;

use App\Models\Madera_lamina;

class MateriaPrimaRepositories
{
    protected $selectMadera =["largo","ancho","espesor","valor_unitario"];

    public function executes($data){
        $bloqueBase= Madera_lamina::findOrFail($data['bloqueBase'],$this->selectMadera);
        $tablaBase= Madera_lamina::findOrFail($data['tablaBase'],$this->selectMadera);
        $listonCostados = Madera_lamina::findOrFail($data['listonCostados'],$this->selectMadera);
        $tablaCostados = Madera_lamina::findOrFail($data['tablaCostados'],$this->selectMadera);
        
        
        switch ($data['tipoBase']) {
            case 'repisa':
                $info = [
                    'bloqueBase' => $bloqueBase,
                    'tablaBase' => $tablaBase,
                    'listonCostados' => $listonCostados,
                    'tablaCostados' => $tablaCostados,
                ];
                break;
            case 'taco':
                $listonBase= Madera_lamina::findOrFail($data['listonBase'],$this->selectMadera);
                $info = [
                    'bloqueBase' => $bloqueBase,
                    'tablaBase' => $tablaBase,
                    'listonBase' => $listonBase,
                    'listonCostados' => $listonCostados,
                    'tablaCostados' => $tablaCostados,
                ];
                break;
            default:
                $info = 'no se encontro informacion';
                break;
        }
        
        return  $info;
    }

}