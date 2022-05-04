<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Ficha_tecnica;

class Base_repisa extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = [
        'ficha_tecnica_id',
        'l_bloque_base',
        'a_bloque_base',
        'e_bloque_base',
        'cant_ubloque_base',   //cantidad unidad
        'cant_tbloque_base',   //cantidad total

        'l_tabla_base',
        'a_tabla_base',
        'e_tabla_base',
        'cant_utabla_base',   //cantidad unidad
        'cant_ttabla_base',   //cantidad total
        
        'l_stabla_base',
        'a_stabla_base',
        'e_stabla_base',
        'cant_ustabla_base',   //cantidad unidad saldo
        'cant_tstabla_base'   //cantidad total saldo
        
    ];

   //relacion uno a uno
   public function ficha_tecnica()
   {
       return $this->belongsTo(Ficha_tecnica::class);
   }
}
