<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Solicitud;

class Cliente extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'nombre',
        'nit',
        'correo',
        'telefono',
        'direccion',
        'ciudad' 
    ];
    //relaciones

    //relacion de uno a muchos
    public function solicituds()
    {
        return $this->hasMany(Solicitud::class);
    }
}
