<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Solicitud;

class Insumo extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable=[
        'descripcion',
        'tipo_unidad',
        'medida',
        'proveedor',
        'cantidad_tipo_unidad',
        'valor_unitario',
    ];

    //relacion muchos a muchos polimorfica
    public function solicitudes()
    {
        return $this->morphToMany(Solicitud::class,'solicitables');
    }
}
