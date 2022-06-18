<?php

namespace App\Service\BaseFactory;

use App\Utility\MedidaExterna;
use App\Interface\Base\TipoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class BloqueRepisa implements TipoBaseInterface
{
    
    public function execute($data,$cantidad)
    {   
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        $medidaExterna = new MedidaExterna($data,$insumoMadera);
        $cantPiezas = floor($data['a_huacal']/$insumoMadera['tabla_base']['ancho']);
        $bloqueBase=[
            'largo' => $medidaExterna->ancho(),
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad,
            'cantidadTotal' => floor($cantidad*$data['cantidad']),
        ];
        $tablaBase=[
            'largo' => $data['l_huacal'],
            'ancho' => $insumoMadera['tabla_base']['ancho'],
            'espesor' =>$insumoMadera['tabla_base']['espesor'],
            'cantidad' => $cantPiezas,
            'cantidadTotal' => $cantPiezas*$data['cantidad'],
        ];
        $tablaBaseSaldo =[
            'largo' => $data['l_huacal'],
            'ancho' => fmod($data['a_huacal'],$insumoMadera['tabla_base']['ancho']),
            'espesor' =>$insumoMadera['tabla_base']['espesor'],
            'cantidad' => 1,
            'cantidadTotal' => 1*$data['cantidad'],
        ];  

        return ['bloqueBase' => $bloqueBase,
                'tablaBase' => $tablaBase,
                'tablaBaseSaldo' => $tablaBaseSaldo];
    }
}