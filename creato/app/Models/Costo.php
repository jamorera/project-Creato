<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Ficha_tecnica;

class Costo extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'ficha_tecnica_id',
        'descripcion',
        'cantidad', 
        'valor_unitario',
        'valor_total',
        'estado'
    ];

    //relacion uno a uno
    public function ficha_tecnica()
    {
        return $this->belongsTo(Ficha_tecnica::class);
    }
}
