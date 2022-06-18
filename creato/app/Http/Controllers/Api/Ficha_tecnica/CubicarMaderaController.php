<?php

namespace App\Http\Controllers\Api\Ficha_tecnica;

use App\Http\Requests\CubicarRules;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Interface\Base\DisenoInterfaceBase;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class CubicarMaderaController extends Controller
{
    protected $repository;
    protected $response;
    protected $infoMateriaPrima;
    protected $baseMadera;
    protected $basePestana;
    public $data;

    public function __construct()
    {
        $this->response = new Response();
        $this->infoMateriaPrima = new MateriaPrimaRepositories();        
    }
    
    public function huacal_madera(DisenoInterfaceBase $baseHuacal , CubicarRules $request){
        try {
            return $baseHuacal->calcular($request->all());
            
        } catch (\Exception $e) {
            throw $e;
        }
    }
   
}
