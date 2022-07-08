<?php

namespace App\Service\CostadoFactory\Ancho;

use App\Interface\Costado\TipoHuacalInterface;

class LaminaAncho implements TipoHuacalInterface
{
    public function execute(){
        return 'ancholamina';
    }
}   