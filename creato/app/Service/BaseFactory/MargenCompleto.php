<?php

namespace App\Service\BaseFactory;

use App\Utility\CantidadBloque;
use App\Factory\TipoBaseFactory;
use App\Interface\Base\DisenoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class MargenCompleto implements DisenoBaseInterface
{
    public function calcular($data){
        
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);
        
        $espesorCostAncho = ($insumoMadera['tablaCostados']['espesor'] + $insumoMadera['listonCostados']['espesor'])*2;

        $cantidadBloque = new CantidadBloque();
        switch ($data['tipoBase']) {
            case 'repisa':
            case 'bloque':
                $cantidad = $cantidadBloque->calcular($data['l_huacal']+$espesorCostAncho,$insumoMadera['bloqueBase']['espesor']);
                break;
            case 'taco':    
                $largo = $cantidadBloque->calcular($data['l_huacal']+$espesorCostAncho,$insumoMadera['bloqueBase']['espesor']);
                $ancho = $cantidadBloque->calcular($data['a_huacal'],$insumoMadera['bloqueBase']['espesor']);
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