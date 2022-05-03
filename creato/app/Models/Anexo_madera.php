<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Anexo_madera extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'l_tabla_costadoA',
        'a_tabla_costadoA',
        'e_tabla_costadoA',
        'cant_utabla_costadoA',   //cantidad unidad
        'cant_ttabla_costadoA',   //cantidad total
        
        'l_stabla_costadoA',
        'a_stabla_costadoA',
        'e_stabla_costadoA',
        'cant_ustabla_costadoA',   //cantidad unidad saldo
        'cant_tstabla_costadoA',   //cantidad total saldo

        'l_tabla_costadoL',
        'a_tabla_costadoL',
        'e_tabla_costadoL',
        'cant_utabla_costadoL',   //cantidad unidad
        'cant_ttabla_costadoL',   //cantidad total
        
        'l_stabla_costadoL',
        'a_stabla_costadoL',
        'e_stabla_costadoL',
        'cant_ustabla_costadoL',   //cantidad unidad saldo
        'cant_tstabla_costadoL',   //cantidad total saldo

        'l_tabla_tapa',
        'a_tabla_tapa',
        'e_tabla_tapa',
        'cant_utabla_tapa',   //cantidad unidad
        'cant_ttabla_tapa',   //cantidad total
        
        'l_stabla_tapa',
        'a_stabla_tapa',
        'e_stabla_tapa',
        'cant_ustabla_tapa',   //cantidad unidad saldo
        'cant_tstabla_tapa'   //cantidad total saldo
    ];
}
