<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use App\Models\User;

class Solicitud extends Model
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

    //relacion muchos a muchos polimorfica inversa

    //tabla users
    public function users()
    {
        return $this->morphedByMany(User::class,'solicitable');
    }

    //tabla insumos
    public function insumos()
    {
        return $this->morphedByMany(Insumo::class,'solicitable');
    }

    //tabla madera_laminas
    public function madera_laminas()
    {
        return $this->morphedByMany(Madera_lamina::class,'solicitable');
    }
}
