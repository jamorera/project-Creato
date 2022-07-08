<?php

namespace App\Service\CostadoFactory\Largo;

use App\Interface\Costado\TipoHuacalInterface;

class LaminaLargo implements TipoHuacalInterface
{
    public function execute(){
        return 'Largolamina';
    }
}   