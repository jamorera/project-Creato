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
        $cantPiezas = floor($data['a_huacal']/$insumoMadera['tablaBase']['ancho']);
        if($data['pestana']==false){
            $this->largoTabla = $data['l_huacal']+($insumoMadera['tablaCostados']['espesor']*2);
        }else{
            $this->largoTabla = $data['l_huacal'];
        }
        $bloqueBase=[
            'largo' => 8.5,
            'ancho' => $insumoMadera['bloqueBase']['ancho'],
            'espesor' =>$insumoMadera['bloqueBase']['espesor'],
            'cantidad' => $cantidad['total'],
            'cantidadTotal' => $cantidad['total']*$data['cantidad'],
        ];
        $tablaBase=[
            'largo' => $this->largoTabla,
            'ancho' => $insumoMadera['tablaBase']['ancho'],
            'espesor' =>$insumoMadera['tablaBase']['espesor'],
            'cantidad' => $cantPiezas,
            'cantidadTotal' => $cantPiezas*$data['cantidad'],
        ];
        $tablaBaseSaldo =[
            'largo' => $this->largoTabla,
            'ancho' => round(fmod($data['a_huacal'],$insumoMadera['tablaBase']['ancho']),2),
            'espesor' =>$insumoMadera['tablaBase']['espesor'],
            'cantidad' => 1,
            'cantidadTotal' => 1*$data['cantidad'],
        ];  
        //con taco
        $tablaTaco=[
            'largo' => $medidaExterna->ancho(),
            'ancho' => $insumoMadera['listonBase']['ancho'],
            'espesor' =>$insumoMadera['listonBase']['espesor'],
            'cantidad' => $cantidad['largo'],
            'cantidadTotal' => floor($cantidad['largo']*$data['cantidad']),
        ];
        $tablaInferior=[
            'largo' => $this->largoTabla,
            'ancho' => $insumoMadera['listonBase']['ancho'],
            'espesor' =>$insumoMadera['listonBase']['espesor'],
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
        
        if($base['tablaBaseSaldo']['ancho'] == 0){
            $base = Arr::except($base, ['tablaBaseSaldo']);            
        }
        return $base;
    }
}