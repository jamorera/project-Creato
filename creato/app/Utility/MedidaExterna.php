<?php

namespace App\Utility;

class MedidaExterna
{
    private $data;
    private $infoMadera;

     public function __construct($data,$infoMadera)
     {
         $this->data = $data;
         $this->infoMadera = $infoMadera;
     }

    public function execute(){  
        return [
            "largo" =>$this->largo(),
            "ancho" =>$this->ancho(),
            "alto" =>$this->alto()
        ];
    }

    function largo(){          
        return round(
            $this->data['l_huacal']
            +($this->infoMadera['listonCostados']['espesor']
            + $this->infoMadera['tablaCostados']['espesor'])*2, 2);
    }
    function ancho(){        
        return round(
            $this->data['a_huacal'] 
            +($this->infoMadera['listonCostados']['espesor'] 
            + $this->infoMadera['tablaCostados']['espesor'])*2, 2);
    }
    function alto(){
        //fata if para cuando la base es taco
        if($this->data['tipoBase'] == 'taco'){
            $alto = round(
                $this->data['h_huacal']
                + $this->infoMadera['bloqueBase']['ancho']
                + $this->infoMadera['tablaBase']['espesor'] 
                + $this->infoMadera['listonCostados']['espesor'] 
                + $this->infoMadera['tablaCostados']['espesor']
                + ($this->infoMadera['listonBase']['espesor']*2),
            2); 
        }else{
            $alto = round(
                $this->data['h_huacal']
                + $this->infoMadera['bloqueBase']['ancho']
                + $this->infoMadera['tablaBase']['espesor'] 
                + $this->infoMadera['listonCostados']['espesor'] 
                + $this->infoMadera['tablaCostados']['espesor'], 
                2);
        }
        return $alto;
    }

}