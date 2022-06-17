<?php

namespace App\Service\BaseFactory;

use App\Factory\TipoBaseFactory;
use App\Interface\Base\DisenoInterfaceBase;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class MargenCompleto implements DisenoInterfaceBase
{
    public function calcular($data){
        // $infoMateriaPrima = new MateriaPrimaRepositories();
        // $insumoMadera = $infoMateriaPrima->executes($data);

        $TipoBaseFactory = new TipoBaseFactory();
        $baseHuacal = $TipoBaseFactory->initialize($data);

        return $baseHuacal->execute($data) ;
    }
}