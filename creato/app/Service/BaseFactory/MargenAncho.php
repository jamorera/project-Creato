<?php

namespace App\Service\BaseFactory;

use App\Factory\TipoBaseFactory;
use App\Interface\Base\TipoBaseInterface;
use App\Interface\Base\DisenoInterfaceBase;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;
use App\Utility\CantidadBloque;

class MargenAncho implements DisenoInterfaceBase
{
    public function __constructor(TipoBaseInterface $tipoBase){
        $this->tipoBase = $tipoBase;
    }

    public function calcular($data){

        $TipoBaseFactory = new TipoBaseFactory();
        $baseHuacal = $TipoBaseFactory->initialize($data);

        
        return $baseHuacal->execute($data) ;
    }
}