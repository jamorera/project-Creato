<?php

namespace App\Service\CostadoFactory\Ancho;

use App\Interface\Costado\TipoHuacalInterface;

class JaulaAncho implements TipoHuacalInterface
{
    public function execute(){
        return 'AnchoJaula';
    }
}   