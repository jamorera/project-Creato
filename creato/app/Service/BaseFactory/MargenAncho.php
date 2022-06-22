<?php

namespace App\Service\BaseFactory;

use App\Factory\TipoBaseFactory;
use App\Interface\Base\DisenoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;
use App\Utility\CantidadBloque;

class MargenAncho implements DisenoBaseInterface
{

    public function calcular($data){

        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        $cantidadBloque = new CantidadBloque();
        switch ($data['tipo_de_base']) {
            case 'repisa':
            case 'bloque':
                $cantidad = $cantidadBloque->calcular($data['l_huacal'],$insumoMadera['bloque_base']['espesor']);
                break;
            case 'taco':
                $largo = $cantidadBloque->calcular($data['l_huacal'],$insumoMadera['bloque_base']['espesor']);
                $ancho = $cantidadBloque->calcular($data['a_huacal'],$insumoMadera['bloque_base']['espesor']);
                $total = $largo * $ancho;
                $cantidad = [
                    'largo' => $largo,
                    'ancho' => $ancho,
                    'total' => $total
                ];
                break;                
            default:
                throw new \Exception('No se pudo inicializar la base ancho');
                break;
        }

        $TipoBaseFactory = new TipoBaseFactory();
        $baseHuacal = $TipoBaseFactory->initialize($data);

        
        return $baseHuacal->execute($data,$cantidad);
    }
}