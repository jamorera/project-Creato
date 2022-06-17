<?php

namespace App\Service\BaseFactory;

use App\Service\Base\TipoBaseService;
use App\Interface\Base\TipoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class BloqueRepisa implements TipoBaseInterface
{
    
    public function execute($data)
    {   
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        $tipoBaseService = new TipoBaseService();
        $cantidad = $tipoBaseService->execute($data,$insumoMadera);

        return $cantidad;
    }
}