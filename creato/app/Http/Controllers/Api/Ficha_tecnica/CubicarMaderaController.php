<?php

namespace App\Http\Controllers\Api\Ficha_tecnica;

use App\Utility\MedidaExterna;
use App\Http\Requests\CubicarRules;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Ficha_tecnica\Huacal_madera\MaderaRepositories;

class CubicarMaderaController extends Controller
{
    protected $repository;
    protected $response;
    protected $infoMadera;
    protected $medidaExterna;
    public $data;

    public function __construct()
    {
        $this->response = new Response();
        $this->infoMadera = new MaderaRepositories();        
    }
    
    public function huacal_madera(CubicarRules $request){
        try {
            //informacion tabla huacal
            $data = $this->infoMadera->execute($request->all()); 
            //medida externa
            $this->medidaExterna = new MedidaExterna($request->all(),$data);
            $medidaExterna = $this->medidaExterna->calcular();
            
            return response()->json([
                $data,
                $medidaExterna
            ]);
        } catch (\Exception $e) {
            //throw $th;
        }
    }
   
}
