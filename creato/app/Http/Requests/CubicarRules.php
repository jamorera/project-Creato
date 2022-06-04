<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Stmt\Switch_;

class CubicarRules extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {        
        $rules = [
            'tipo_de_huacal' => 'required',
            'l_huacal' => 'required|numeric',
            'a_huacal' => 'required|numeric',
            'h_huacal'  => 'required|numeric',
            'peso' => 'required|numeric',
            'cantidad'  => 'required|numeric',
            'bloque_base' => 'required|numeric',
            'tabla_base' =>'required|numeric',
            'liston_costados' => 'required|numeric',
            'tabla_costados' =>'required|numeric',
            'puntilla_base' =>'required|numeric',
            'puntilla_costados' =>'required|numeric'
        ];
        if($this->tipo_de_huacal == 'jaula'){
            $rules = array_merge($rules, [                
                'separacion' => 'required|numeric'
            ]);
        }
        return $rules;            
    }
}
