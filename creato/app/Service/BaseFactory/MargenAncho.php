<?php

namespace App\Service\BaseFactory;

use App\Factory\TipoBaseFactory;
use App\Interface\Base\TipoBaseInterface;
use App\Interface\Base\DisenoInterfaceBase;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class MargenAncho implements DisenoInterfaceBase
{
    private $infoMateriaPrima;
    private $insumos;
    public function __constructor(TipoBaseInterface $tipoBase){
        $this->tipoBase = $tipoBase;
    }

    public function calcular($data){
        //informacion tabla huacal
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);

        //Cantidad repisas o bloques
        $cantidad->calcular($data['l_huacal'],$insumoMadera['bloque_base']['espesor']);


        $TipoBaseFactory = new TipoBaseFactory();
        $baseHuacal = $TipoBaseFactory->initialize($data);

        
        return $baseHuacal->execute($cantidad) ;
    }
}