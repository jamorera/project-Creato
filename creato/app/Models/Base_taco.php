<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Base_taco extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'l_taco_base',
        'a_taco_base',
        'e_taco_base',
        'cant_utaco_base',   //cantidad unidad
        'cant_ttaco_base',   //cantidad total

        'l_tabla_base_sup',
        'a_tabla_base_sup',
        'e_tabla_base_sup',
        'cant_utabla_base_sup',   //cantidad unidad superior
        'cant_ttabla_base_sup',   //cantidad total superior

        'l_tabla_taco',
        'a_tabla_taco',
        'e_tabla_taco',
        'cant_utabla_taco',   //cantidad unidad
        'cant_ttabla_taco',   //cantidad total 

        'l_tabla_base_inf',
        'a_tabla_base_inf',
        'e_tabla_base_inf',
        'cant_utabla_base_inf',   //cantidad unidad inferior
        'cant_ttabla_base_inf'   //cantidad total inferior
    ];
}
