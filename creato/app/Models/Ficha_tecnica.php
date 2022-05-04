<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Solicitud;
use App\Models\Costo;
use App\Models\Base_repisa;
use App\Models\Base_taco;
use App\Models\Anexo_lamina;
use App\Models\Anexo_madera;

class Ficha_tecnica extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillaable = [
        'solicitud_id',

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
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }
    
    public function costo()
    {
        return $this->hasOne(Costo::class);
    }

    public function base_repisa()
    {
        return $this->hasOne(Base_repisa::class);
    }

    public function base_taco()
    {
        return $this->hasOne(Base_taco::class);
    }

    public function anexo_lamina()
    {
        return $this->hasOne(Anexo_lamina::class);
    }

     public function anexo_madera()
    {
        return $this->hasOne(Anexo_madera::class);
    }
}
