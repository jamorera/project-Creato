<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Solicitud;

class Madera_lamina extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'descripcion',
        'tipo',
        'largo',
        'ancho',
        'espesor',
        'valor_unitario',
    ];

    //relacion muchos a muchos polimorfica
    public function solicitudes()
    {
        return $this->morphToMany(Solicitud::class,'solicitables');
    }
}
