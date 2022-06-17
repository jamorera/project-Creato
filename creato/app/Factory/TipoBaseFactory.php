<?php

namespace App\Factory;

use App\Service\BaseFactory\Taco;
use App\Service\BaseFactory\BloqueRepisa;

class TipoBaseFactory 
{
    public function initialize($data)
    {
        switch ($data['tipo_de_base']) {
            case'repisa':
            case 'bloque':
                return new BloqueRepisa();
            break;
            case 'taco':
                return new Taco();
            break;
            default:
                throw new \Exception('No se pudo inicializar la base');
            break;
        }
    }
}