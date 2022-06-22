<?php

namespace App\Service\BaseFactory;

use Illuminate\Support\Arr;
use App\Utility\MedidaExterna;
use App\Interface\Base\TipoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class Taco implements TipoBaseInterface
{
    public $largoTable = 0;

    public function execute($data,$cantidad)
    {
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        $medidaExterna = new MedidaExterna($data,$insumoMadera);
        $cantPiezas = floor($data['a_huacal']/$insumoMadera['tabla_base']['ancho']);
        if($data['pestana']==false){
            $this->largoTable = $data['l_huacal']+($insumoMadera['tabla_costados']['espesor']*2);
        }else{
            $this->largoTable = $data['l_huacal'];
        }
        $bloqueBase=[
            'largo' => $medidaExterna->ancho(),
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad['total'],
            'cantidadTotal' => floor($cantidad['total']*$data['cantidad']),
        ];
        $tablaBase=[
            'largo' => $this->largoTable,
            'ancho' => $insumoMadera['tabla_base']['ancho'],
            'espesor' =>$insumoMadera['tabla_base']['espesor'],
            'cantidad' => $cantPiezas,
            'cantidadTotal' => $cantPiezas*$data['cantidad'],
        ];
        $tablaBaseSaldo =[
            'largo' => $this->largoTable,
            'ancho' => round(fmod($data['a_huacal'],$insumoMadera['tabla_base']['ancho']),2),
            'espesor' =>$insumoMadera['tabla_base']['espesor'],
            'cantidad' => 1,
            'cantidadTotal' => 1*$data['cantidad'],
        ];  
        //con taco
        $tablaTaco=[
            'largo' => $data['a_huacal'],
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad['largo'],
            'cantidadTotal' => floor($cantidad['largo']*$data['cantidad']),
        ];
        $tablaInferior=[
            'largo' => $medidaExterna->largo(),
            'ancho' => $insumoMadera['bloque_base']['ancho'],
            'espesor' =>$insumoMadera['bloque_base']['espesor'],
            'cantidad' => $cantidad['ancho'],
            'cantidadTotal' => floor($cantidad['ancho']*$data['cantidad']),
        ];
        $base = [
            'bloqueBase' => $bloqueBase,
            'tablaBase' => $tablaBase,
            'tablaBaseSaldo' => $tablaBaseSaldo,    
            'tablaTaco' => $tablaTaco,
            'tablaInferior' => $tablaInferior
        ];
        var_dump($base['tablaBaseSaldo']['ancho']);
        if($base['tablaBaseSaldo']['ancho'] == 0){
            $base = Arr::except($base, ['tablaBaseSaldo']);            
        }
        return $base;
    }
}