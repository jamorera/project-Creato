<?php

namespace App\Service\BaseFactory;

use App\Utility\MedidaExterna;
use App\Interface\BaseInterface;
use App\Service\Base\TipoBaseService;
use App\Interface\Base\TipoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class Taco implements TipoBaseInterface
{
    
    public function execute($data,$cantidad)
    {
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        $medidaExterna = new MedidaExterna($data,$insumoMadera);
        $cantPiezas = floor($data['a_huacal']/$insumoMadera['tabla_base']['ancho']);
        // $tipoBaseService = new TipoBaseService();
        // $cantidad = $tipoBaseService->execute($data,$insumoMadera);
        $bloqueBase=[
            'largo' => $medidaExterna->ancho(),
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad['total'],
            'cantidadTotal' => floor($cantidad['total']*$data['cantidad']),
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
        //con taco
        $tablaTaco=[
            'largo' => $medidaExterna->ancho(),
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad['largo'],
            'cantidadTotal' => floor($cantidad['largo']*$data['cantidad']),
        ];
        $tablaInferior=[
            'largo' => $data['l_huacal'],
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad['ancho'],
            'cantidadTotal' => floor($cantidad['ancho']*$data['cantidad']),
        ];


        return [
            'bloqueBase' => $bloqueBase,
            'tablaBase' => $tablaBase,
            'tablaBaseSaldo' => $tablaBaseSaldo,    
            'tablaTaco' => $tablaTaco,
            'tablaInferior' => $tablaInferior
        ];
    }
}