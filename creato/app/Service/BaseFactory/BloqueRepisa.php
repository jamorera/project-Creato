<?php

namespace App\Service\BaseFactory;

use App\Interface\Base\TipoBaseInterface;

class BloqueRepisa implements TipoBaseInterface
{
    
    public function execute($data)
    {   
        return $data;
    }
}