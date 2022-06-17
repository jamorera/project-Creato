<?php

namespace App\Utility;


class CantidadBloque
{
    private $cantBloque;
    private $cantEspacios;
    private $distEstimada;

    public function calcular($medida,$espesor){
        $this->cantBloque=2;
        $this->cantEspacios = 1;
        var_dump($medida);
        do{
            $this->cantBloque++;
            $this->cantEspacios++;
            $this->distEstimada = $espesor*$this->cantBloque;
            $this->distEstimada = ($medida-$this->distEstimada)/$this->cantEspacios;
            $cantidad = $this->cantBloque;    
        }while ($this->distEstimada > 60);
        return $cantidad;
    }
    
    
}
