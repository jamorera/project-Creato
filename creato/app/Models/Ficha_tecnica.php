<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Requerimiento;

class Ficha_tecnica extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillaable = [
        'requerimiento_id',

        'tipo_de_base',
        'l_externo',
        'a_externo',
        'h_externo',
        //costado Ancho 
        'l_liston_costadoA',
        'a_liston_costadoA',
        'e_liston_costadoA',
        'cant_uliston_costadoA',   //cantidad unidad
        'cant_tliston_costadoA',   //cantidad total
        //costado Largo
        'l_liston_costadoL',
        'a_liston_costadoL',
        'e_liston_costadoL',
        'cant_uliston_costadoL',   //cantidad unidad
        'cant_tliston_costadoL',   //cantidad total
        //costado tapa
        'l_liston_tapa',
        'a_liston_tapa',
        'e_liston_tapa',
        'cant_uliston_tapa',   //cantidad unidad
        'cant_tliston_tapa'   //cantidad unidad
    ];

    //relaciones

    

    //relacion uno a uno 
    public function requerimientos()
    {
        return $this->belongsTo(Requerimiento::class);
    }
}
