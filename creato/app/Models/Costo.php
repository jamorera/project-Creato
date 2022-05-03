<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Costo extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'descripcion',
        'cantidad', 
        'valor_unitario',
        'valor_total',
        'estado'
    ];
}
