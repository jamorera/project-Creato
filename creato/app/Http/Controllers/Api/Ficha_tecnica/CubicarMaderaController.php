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
            //informacion tabla huacal
            // $data = $this->infoMateriaPrima->execute($request->all()); 
            // // prueba BaseMadera
            // $baseHuacal= $baseMadera->madera($request->all(),$data);
            // prueba BasePestana
            // $basePestana= $baseMadera->maderaPestana($request->all(),$data);
        
            // $cubicarBaseFactory = new CubicarBaseFactory();
            // $baseHuacal = $cubicarBaseFactory->initialize($request->all());
            return $baseHuacal->calcular($request->all());

            // $tablaBase =[
            //     'largo' => $request->l_huacal,
            //     'ancho' => $data['tabla_base']['ancho'],
            //     'espesor' => $data['tabla_base']['espesor'],
            //     'cantidad' =>floor($request->a_huacal/$data['tabla_base']['ancho']),
            //     'cantidadTotal' => floor($request->a_huacal/$data['tabla_base']['ancho'])*$request->cantidad,
            // ];

            // $tablaBaseSaldo =[
            //     'largo' => $request->l_huacal,
            //     'ancho' => fmod($request->a_huacal,$data['tabla_base']['ancho']),
            //     'espesor' =>$data['tabla_base']['espesor'],
            //     'cantidad' => 1,
            //     'cantidadTotal' => 1*$request->cantidad,
            // ];
            // return response()->json([
            //     'Base Huacal' => $baseHuacal,
            //     // 'Base Pestana' => $basePestana,
            //     // 'bloque' => $bloqueBase,
            //     //  $tablaBase,
            //     // $tablaBaseSaldo,
            // ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
   
}
