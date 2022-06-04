<?php

namespace App\Utility;

use Illuminate\Support\Arr;

class MedidaExterna
{
    private $data;
    private $infoMadera;
    public $espesorListon;
    public $espesorTabla;
     public function __construct($data,$infoMadera)
     {
         $this->data = $data;
         $this->infoMadera = $infoMadera;
         $this->espesorListon = $this->infoMadera['liston_costados']['espesor'];
        $this->espesorTabla = $this->infoMadera['tabla_costados']['espesor'];
     }
    public function calcular(){  
        return [
            "largo" =>$this->largo(),
            "ancho" =>$this->ancho(),
            "alto" =>$this->alto()
        ];
    }

    function largo(){        
        return round($this->data['l_huacal'] + 
        ($this->espesorListon + $this->espesorTabla)*2, 2);
    }
    function ancho(){        
        return round($this->data['a_huacal'] + 
        ($this->infoMadera['liston_costados']['espesor'] + $this->infoMadera['tabla_costados']['espesor'])*2, 2);
    }
    function alto(){
        return round($this->data['h_huacal'] + $this->infoMadera['bloque_base']['ancho'] + $this->infoMadera['tabla_base']['espesor'] + $this->infoMadera['liston_costados']['espesor'] + $this->infoMadera['tabla_costados']['espesor'], 2);
    }

}