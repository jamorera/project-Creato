<?php

namespace App\Http\Controllers\Api\Ficha_tecnica;

use App\Utility\MedidaExterna;
use App\Http\Requests\CubicarRules;
use App\Http\Responsables\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Ficha_tecnica\Huacal_madera\MateriaPrimaRepositories;
use PhpParser\Node\Stmt\While_;

class CubicarMaderaController extends Controller
{
    protected $repository;
    protected $response;
    protected $infoMateriaPrima;
    protected $medidaExterna;
    public $data;

    public function __construct()
    {
        $this->response = new Response();
        $this->infoMateriaPrima = new MateriaPrimaRepositories();        
    }
    
    public function huacal_madera(CubicarRules $request){
        try {
            //informacion tabla huacal
            $data = $this->infoMateriaPrima->execute($request->all()); 
            //medida externa
            $this->medidaExterna = new MedidaExterna($request->all(),$data);
            $medidaExterna = $this->medidaExterna->execute();
            $cantBloque = 2;
            $cantEspacios = 1;
            do{
                $cantBloque++;
                $cantEspacios++;
                $prueba = $data['bloque_base']['espesor']*$cantBloque;
                $prueba = ($request->l_huacal-$prueba)/$cantEspacios;
                $cantidad = $cantBloque;    
            }while ($prueba > 60);

            $bloqueBase=[
                'largo' => $this->medidaExterna->ancho(),
                'ancho' => $data['bloque_base']['ancho'],
                'espesor' =>$data['bloque_base']['espesor'],
                'cantidad' => $cantidad,
                'cantidadTotal' => floor($cantidad*$request->cantidad),
             ];
             $tablaBase=[
                'largo' => $request->l_huacal,
                'ancho' => $data['tabla_base']['ancho'],
                'espesor' =>$data['tabla_base']['espesor'],
                'cantidad' => floor($request->a_huacal/$data['tabla_base']['ancho']),
                'cantidadTotal' => floor($request->a_huacal/$data['tabla_base']['ancho'])*$request->cantidad,
             ];
             $tablaBaseSaldo =[
                'largo' => $request->l_huacal,
                'ancho' => fmod($request->a_huacal,$data['tabla_base']['ancho']),
                'espesor' =>$data['tabla_base']['espesor'],
                'cantidad' => 1,
                'cantidadTotal' => 1*$request->cantidad,
             ];
            return response()->json([
                'bloque' => $bloqueBase,
                $tablaBase,
                $tablaBaseSaldo,
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
   
}
