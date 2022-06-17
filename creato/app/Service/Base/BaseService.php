<?php

namespace App\Service\Base;

use App\Utility\MedidaExterna;
use App\Interface\TipoBaseInterface;
use App\Interface\BaseMaderaInterface;

class BaseService implements BaseMaderaInterface
{
    private $cantidadBloque;
    protected $medidaExterna;
    protected $cantidad;
    protected $cantPiezas;

    public function __construct(TipoBaseInterface $tipoBase){
        $this->tipoBase = $tipoBase;        
    }

    public function madera($data,$infoMateriaPrima){
        $this->cantidad = $this->tipoBase->execute($data,$infoMateriaPrima); //trae la cantidad de bloques, repisas o tacos necesarios segun el tipo de base y la pestaña
        $this->medidaExterna = new MedidaExterna($data,$infoMateriaPrima);
        $this->cantPiezas = floor($data['a_huacal']/$infoMateriaPrima['tabla_base']['ancho']);
        $bloqueBase=[
            'largo' => $this->medidaExterna->ancho(),
            'ancho' => $infoMateriaPrima['bloque_base']['ancho'],
            'espesor' =>$infoMateriaPrima['bloque_base']['espesor'],
            'cantidad' => $this->cantidad,
            'cantidadTotal' => floor($this->cantidad*$data['cantidad']),
        ];
        $tablaBase=[
            'largo' => $data['l_huacal'],
            'ancho' => $infoMateriaPrima['tabla_base']['ancho'],
            'espesor' =>$infoMateriaPrima['tabla_base']['espesor'],
            'cantidad' => $this->cantPiezas,
            'cantidadTotal' => $this->cantPiezas*$data['cantidad'],
        ];
        $tablaBaseSaldo =[
            'largo' => $data['l_huacal'],
            'ancho' => fmod($data['a_huacal'],$infoMateriaPrima['tabla_base']['ancho']),
            'espesor' =>$infoMateriaPrima['tabla_base']['espesor'],
            'cantidad' => 1,
            'cantidadTotal' => 1*$data['cantidad'],
        ];  
        //con taco
        $tablaTaco=[
            'largo' => $this->medidaExterna->ancho(),
            'ancho' => $infoMateriaPrima['bloque_base']['ancho'],
            'espesor' =>$infoMateriaPrima['bloque_base']['espesor'],
            'cantidad' => $this->cantidad,
            'cantidadTotal' => floor($this->cantidad*$data['cantidad']),
        ];
        $tablaInferior=[
            'largo' => $data['l_huacal'],
            'ancho' => $infoMateriaPrima['bloque_base']['ancho'],
            'espesor' =>$infoMateriaPrima['bloque_base']['espesor'],
            'cantidad' => $this->cantidad,
            'cantidadTotal' => floor($this->cantidad*$data['cantidad']),
        ];
        if($data['tipo_de_base']=='taco'){
            $base=[
                'bloqueBase' => $bloqueBase,
                'tablaBase' => $tablaBase,
                'tablaBaseSaldo' => $tablaBaseSaldo,    
                'tablaTaco' => $tablaTaco,
                'tablaInferior' => $tablaInferior
            ];
        }else{
            $base=[
                'bloqueBase' => $bloqueBase,
                'tablaBase' => $tablaBase,
                'tablaBaseSaldo' => $tablaBaseSaldo
            ];
        }
        
        return $base;

    }
}