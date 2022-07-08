<?php

namespace App\Service\CostadoFactory\Madera;

use Illuminate\Support\Arr;
use App\Utility\CantidadBloque;
use App\Interface\Costado\TipoHuacalInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class Ancho implements TipoHuacalInterface
{
    protected $data;
    protected $infoMateriaPrima;
    protected $cantidadBloque;

    public function __construct($data) {
       $this->data = $data;
       $this->infoMateriaPrima = new MateriaPrimaRepositories();       
    }
    public function execute(){
        
        $insumoMadera = $this->infoMateriaPrima->executes($this->data);
        $ancho = $this->data['a_huacal'];
        $LargoTabla = round($this->data['a_huacal']+($insumoMadera['listonCostados']['espesor']+$insumoMadera['tablaCostados']['espesor'])*2,2);
        $largoListon = $this->data['h_huacal']+$insumoMadera['tablaBase']['espesor']+$insumoMadera['bloqueBase']['ancho'];
        
        $cantBloque = new CantidadBloque();
        $cantListon = $cantBloque->calcular($ancho,$insumoMadera['listonCostados']['ancho'])*2;
        $cantTabla = floor($this->data['h_huacal']/$insumoMadera['tablaCostados']['ancho'])*2;
        

        $listonAncho =[
            'largo' => $largoListon,
            'ancho' => $insumoMadera['listonCostados']['ancho'],
            'espesor' => $insumoMadera['listonCostados']['espesor'],
            'cantidad' => $cantListon,
            'cantidadTotal' => $cantListon*$this->data['cantidad'],
        ];
        $tablaAncho = [
            'largo' => $LargoTabla,
            'ancho' => $insumoMadera['tablaCostados']['ancho'],
            'espesor' => $insumoMadera['tablaCostados']['espesor'],
            'cantidad' => $cantTabla,
            'cantidadTotal' => $cantTabla*$this->data['cantidad'],
        ];
        $saldoTablaAncho =[
            'largo' => $LargoTabla,
            'ancho' => round(fmod($this->data['h_huacal'],$insumoMadera['tablaCostados']['ancho']),2),
            'espesor' => $insumoMadera['tablaCostados']['espesor'],
            'cantidad' => 2,
            'cantidadTotal' => $this->data['cantidad']*2,
        ];
        $costadoAncho = [
            'liston' => $listonAncho,
            'tabla' => $tablaAncho,
            'tablaSaldo' => $saldoTablaAncho
        ];
        if($costadoAncho['tablaSaldo']['ancho'] == 0){
            $costadoAncho = Arr::except($costadoAncho, ['tablaSaldo']);            
        }
        return $costadoAncho;
       
    }
}   