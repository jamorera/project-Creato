<?php 

namespace App\Service\CostadoFactory;

use App\Factory\TipoHuacalFactory;
use App\Service\CostadoFactory\Madera\Ancho;
use App\Service\CostadoFactory\Madera\Largo;
use App\Interface\Costado\DisenoCostadoInterface;


class Costado implements DisenoCostadoInterface
{  
    public function __construct()
    {
        $this->tipoHuacalFactory = new TipoHuacalFactory();
    }
    
    public function calcular($data)
    {
        switch ($data['tipoHuacal']) {
            case'madera':                
                $largo = new Largo($data);
                $ancho = new Ancho($data);
                return [
                    'ancho' => $ancho->execute(),
                    'largo' => $largo->execute(),
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
        // $tipoHuacalFactory = new TipoHuacalFactory();
        // $tipoBase = $tipoHuacalFactory->initialize($data);
        // return $tipoBase;
    }
}