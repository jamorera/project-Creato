<?php

namespace App\Service\Base;

use App\Utility\CantidadBloque;

class TipoBaseService
{

    public $cantLargo;
    public $cantAncho;
    public $cantidad;
    public $espesorCostAncho;
    
    public function __construct()
    {
        $this->cantidadBloque = new CantidadBloque();
    }

    public function execute($data, $infoMateriaPrima){
        $espesorCostAncho = ($infoMateriaPrima['tabla_costados']['espesor'] + $infoMateriaPrima['liston_costados']['espesor'])*2; 
        $this->cantAncho= $this->cantidadBloque->calcular($data['a_huacal'],$infoMateriaPrima['bloque_base']['espesor']);
        
        switch ($data['pestana']) {
            case true:
                $this->cantLargo = $this->cantidadBloque->calcular($data['l_huacal']+$espesorCostAncho,$infoMateriaPrima['bloque_base']['espesor']);
                switch ($data['tipo_de_base']){
                    case 'bloque':
                    case 'repisa':                       
                        $this->cantidad = $this->cantLargo;
                    break;
                    case 'taco': 
                        $this->cantidad =  $this->cantLargo*$this->cantAncho;
                    break;
                }
            break;
            case false:
                $this->cantLargo = $this->cantidadBloque->calcular($data['l_huacal'],$infoMateriaPrima['bloque_base']['espesor']);
                switch ($data['tipo_de_base']){
                    case 'bloque':
                    case 'repisa':                       
                        $this->cantidad = $this->cantLargo;
                    break;
                    case 'taco': 
                        $this->cantidad = $this->cantLargo*$this->cantAncho;
                    break;

                }
            break;
        }
        return $this->cantidad;
        
    }
}