<?php

namespace App\Service\CostadoFactory\MAdera;

use Illuminate\Support\Arr;
use App\Utility\CantidadBloque;
use App\Interface\Costado\TipoHuacalInterface;
use App\Repositories\Ficha_tecnica\InfoMateriaPrima\MateriaPrimaRepositories;

class Largo implements TipoHuacalInterface
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
        $largoListon = $this->data['h_huacal']+$insumoMadera['tablaBase']['espesor'];

        $cantBloque = new CantidadBloque();
        $cantListon = $cantBloque->calcular($this->data['l_huacal'],$insumoMadera['bloqueBase']['espesor'])*2; //se genera con la informacion de la base
        $cantTabla = floor($largoListon/$insumoMadera['tablaCostados']['ancho'])*2; 

        $listonLargo = [
            'largo' => $largoListon,
            'ancho' => $insumoMadera['listonCostados']['ancho'],
            'espesor' => $insumoMadera['listonCostados']['espesor'],
            'cantidad' => $cantListon,
            'cantidadTotal' => $cantListon*$this->data['cantidad'],
        ];
        $tablaLargo = [
            'largo' => $this->data['l_huacal'],
            'ancho' => $insumoMadera['tablaCostados']['ancho'],
            'espesor' => $insumoMadera['tablaCostados']['espesor'],
            'cantidad' => $cantTabla,
            'cantidadTotal' => $cantTabla*$this->data['cantidad'],
        ];
        $saldoTablaLargo = [
            'largo' => $this->data['l_huacal'],
            'ancho' => round(fmod($largoListon,$insumoMadera['tablaCostados']['ancho']),2),
            'espesor' => $insumoMadera['tablaCostados']['espesor'],
            'cantidad' => 2,
            'cantidadTotal' => $this->data['cantidad']*2,
        ];
        $costadoLargo = [
            'liston' => $listonLargo,
            'tabla' => $tablaLargo,
            'tablaSaldo' => $saldoTablaLargo, 
        ];
        if($costadoLargo['tablaSaldo']['ancho'] == 0){
            $costadoLargo = Arr::except($costadoLargo, ['tablaSaldo']);            
        }

        return $costadoLargo;
    }
}   