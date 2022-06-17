<?php

namespace App\Service\BaseFactory;

use App\Interface\Base\TipoBaseInterface;

class Taco implements TipoBaseInterface
{
    public function execute($data)
    {
        return 'taco';
    }
}