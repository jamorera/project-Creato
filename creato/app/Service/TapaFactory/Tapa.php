<?php

namespace App\Service\TapaFactory;

use App\Utility\MedidaExterna;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class Tapa 
{
    public function calcular($data)
    {
        $infoMateriaPrima = new MateriaPrimaRepositories();
        $insumoMadera = $infoMateriaPrima->executes($data);
        $medidaExterna = new MedidaExterna($data,$insumoMadera);                 



        return $medidaExterna->execute();
    }
}