<?php

namespace App\Service\BaseFactory;

use App\Interface\BaseInterface;
use App\Interface\Base\TipoBaseInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;
use App\Service\Base\TipoBaseService;

class Taco implements TipoBaseInterface
{
    private $tipoBase;

    public function __constructor(BaseInterface $tipoBase){
        $this->tipoBase = $tipoBase;
    }
    public function execute($data)
    {
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        $tipoBaseService = new TipoBaseService();
        $cantidad = $tipoBaseService->execute($data,$insumoMadera);

        return $cantidad;
    }
}