<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Laravel\Sanctum\HasApiTokens;
use App\Models\Ficha_tecnica;

class Requerimiento extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = [
        'tipo_de_huacal',
        'l_huacal',
        'a_huacal',
        'h_huacal',
        'peso',
        'cantidad',
        'separacion'
    ];

    //relaciones

    //relacion uno a uno
    public function ficha_tecnicas()
    {
        return $this->hasOne(Ficha_tecnica::class);
    }
}
