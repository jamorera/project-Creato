<?php 

namespace App\Repositories\Ficha_tecnica\Base;

class BaseMadera
{
    public function __construct($data,$infoMateriaPrima)
    {
        $this->data = $data;
        $this->infoMateriaPrima = $infoMateriaPrima;
    }
     
    public function execute()
    {
        //base de madera
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
        
    }
}