<?php

namespace App\Service\BaseFactory;

use App\Factory\TipoBaseFactory;
use App\Interface\Base\DisenoInterfaceBase;

class MargenCompleto implements DisenoInterfaceBase
{
    public function calcular($data){
        $TipoBaseFactory = new TipoBaseFactory();
        $baseHuacal = $TipoBaseFactory->initialize($data);
        return $baseHuacal->execute($data) .' Margen Completo...';
    }
}