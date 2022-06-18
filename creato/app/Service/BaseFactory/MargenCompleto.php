<?php

namespace App\Service\BaseFactory;

use App\Utility\CantidadBloque;
use App\Factory\TipoBaseFactory;
use App\Interface\Base\DisenoInterfaceBase;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class MargenCompleto implements DisenoInterfaceBase
{
    public function calcular($data){
        
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);
        
        $espesorCostAncho = ($insumoMadera['tabla_costados']['espesor'] + $insumoMadera['liston_costados']['espesor'])*2;

        $cantidadBloque = new CantidadBloque();
        switch ($data['tipo_de_base']) {
            case 'repisa':
            case 'bloque':
                $cantidad = $cantidadBloque->calcular($data['l_huacal']+$espesorCostAncho,$insumoMadera['bloque_base']['espesor']);
                break;
            case 'taco':    
                $largo = $cantidadBloque->calcular($data['l_huacal']+$espesorCostAncho,$insumoMadera['bloque_base']['espesor']);
                $ancho = $cantidadBloque->calcular($data['a_huacal'],$insumoMadera['bloque_base']['espesor']);
                $total = $largo * $ancho;
                $cantidad = [
                    'largo' => $largo,
                    'ancho' => $ancho,
                    'total' => $total
                ];
                break;
            default:
                throw new \Exception('No se pudo inicializar la base completa');
            break;
        }

        $TipoBaseFactory = new TipoBaseFactory();
        $baseHuacal = $TipoBaseFactory->initialize($data);

        return $baseHuacal->execute($data,$cantidad);
    }
}