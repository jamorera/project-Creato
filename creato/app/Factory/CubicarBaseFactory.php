<?php

namespace App\Factory;

use App\Service\BaseFactory\MargenAncho;
use App\Service\BaseFactory\MargenCompleto;

class CubicarBaseFactory 
{
    public function initialize($data)
    {
        switch ($data['pestana']) {
            case true:
                return new MargenCompleto();
            break;
            case false:
                return new MargenAncho();
            break;
            default:
                throw new \Exception('No se pudo inicializar la base');
            break;
        }
    }
}