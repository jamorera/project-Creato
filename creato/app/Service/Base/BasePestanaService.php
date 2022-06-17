<?php

namespace App\Service\Base;

use App\Utility\CantidadBloque;
use App\Interface\BaseMaderaInterface;

abstract class BasePestanaService implements BaseMaderaInterface
{
    private $cantidadBloque;
    public function __construct(CantidadBloque $cantidadBloque)
    {
        $this->cantidadBloque = $cantidadBloque;
    }

    public function maderaPestana($data, $infoMateriaPrima){
        return $data;
    }

}