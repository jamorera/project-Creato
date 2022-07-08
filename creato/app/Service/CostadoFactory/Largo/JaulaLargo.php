<?php

namespace App\Service\CostadoFactory\Largo;

use App\Interface\Costado\TipoHuacalInterface;

class JaulaLargo implements TipoHuacalInterface
{
    public function execute(){
        return 'LargoJaula';
    }
}   