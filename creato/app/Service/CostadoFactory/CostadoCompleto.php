<?php 

namespace App\Service\CostadoAnchoFactory;

use App\Interface\Costado\DisenoCostadoInterface;

class CostadoCompleto implements DisenoCostadoInterface
{  
    public function calcular($data)
    {
        return 'Completo';
    }
}
