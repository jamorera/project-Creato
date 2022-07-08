<?php

namespace App\Factory;

use App\Service\CostadoFactory\Ancho\JaulaAncho;
use App\Service\CostadoFactory\Ancho\LaminaAncho;
use App\Service\CostadoFactory\Ancho\MaderaAncho;
use App\Service\CostadoFactory\Largo\JaulaLargo;
use App\Service\CostadoFactory\Largo\LaminaLargo;
use App\Service\CostadoFactory\Largo\MaderaLargo;

class TipoHuacalFactory 
{
    protected $maderaAncho;
    protected $maderaLargo;
    protected $laminaAncho;
    protected $laminaLargo; 
    protected $jaulaAncho;
    protected $jaulaLargo; 
    

    public function initialize($data)
    {
        $this->maderaAncho = new MaderaAncho($data);
        $this->maderaLargo = new MaderaLargo();
        $this->laminaAncho = new LaminaAncho();
        $this->laminaLargo = new LaminaLargo();
        $this->jaulaAncho = new JaulaAncho();
        $this->jaulaLargo = new JaulaLargo();
        switch ($data['tipoHuacal']) {
            case'madera':                
                return [
                    $this->maderaLargo->execute(),
                    $this->maderaAncho->execute()
                ];
            break;   
            case'jaula':                
                return [
                    $this->jaulaLargo->execute(),
                    $this->jaulaAncho->execute(),
                ];
            break;         
            case 'triplex':
            case 'carton':
                return [
                    $this->laminaLargo->execute(),
                    $this->laminaAncho->execute()
                ];
            break;
            default:
                throw new \Exception('No se pudo inicializar el tipo de huacal');
            break;
        }
    }
}