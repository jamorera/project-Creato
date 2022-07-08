<?php

namespace App\Http\Controllers\Api\Ficha_tecnica;

use App\Http\Requests\CubicarRules;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Service\TapaFactory\Tapa;
use App\Interface\Base\DisenoBaseInterface as Base;
use App\Interface\Costado\DisenoCostadoInterface as Costado;


class CubicarMaderaController extends Controller
{
    protected $response;
    protected $base;
    protected $costado;
    protected $tapa;

    public function __construct(Base $base, Costado $costado, Tapa $tapa )
    {
        $this->response = new Response();  
        $this->base = $base;  
        $this->costado = $costado;
        $this->tapa = $tapa;
    }
    
    public function huacal_madera(CubicarRules $request){
        try {
            $base = $this->base->calcular($request->all());            
            $costado = $this->costado->calcular($request->all());
            $tapa = $this->tapa->calcular($request->all());
            
            return ['base' => $base,'costados' => $costado,'tapa' => $tapa];
        } catch (\Exception $e) {
            throw $e;
        }
    }
   
}
