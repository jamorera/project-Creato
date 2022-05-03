<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Anexo_lamina extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'l_liston_costadoA',
        'a_liston_costadoA',
        'e_liston_costadoA',
        'cant_uliston_costadoA',   //cantidad unidad
        'cant_tliston_costadoA',   //cantidad total

        'l_lamina_costadoA',
        'a_lamina_costadoA',
        'e_lamina_costadoA',
        'cant_ulamina_costadoA',   //cantidad unidad
        'cant_tlamina_costadoA',   //cantidad total

        'l_liston_costadoL',
        'a_liston_costadoL',
        'e_liston_costadoL',
        'cant_uliston_costadoL',   //cantidad unidad
        'cant_tliston_costadoL',   //cantidad total

        'l_liston_costadoL_int',
        'a_liston_costadoL_int',
        'e_liston_costadoL_int',
        'cant_uliston_costadoL_int',   //cantidad unidad interno
        'cant_tliston_costadoL_int',   //cantidad total interno

        'l_lamina_costadoL',
        'a_lamina_costadoL',
        'e_lamina_costadoL',
        'cant_ulamina_costadoL',   //cantidad unidad
        'cant_tlamina_costadoL',   //cantidad total

        'l_liston_tapa',
        'a_liston_tapa',
        'e_liston_tapa',
        'cant_uliston_tapa',   //cantidad unidad
        'cant_tliston_tapa',   //cantidad total

        'l_liston_tapa_int',
        'a_liston_tapa_int',
        'e_liston_tapa_int',
        'cant_uliston_tapa_int',   //cantidad unidad interno
        'cant_tliston_tapa_int',   //cantidad total interno

        'l_lamina_tapa',
        'a_lamina_tapa',
        'e_lamina_tapa',
        'cant_ulamina_tapa',   //cantidad unidad
        'cant_tlamina_tapa',   //cantidad total
    ];
}
