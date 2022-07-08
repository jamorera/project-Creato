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
            'tipoHuacal' => 'required',
            'l_huacal' => 'required|numeric',
            'a_huacal' => 'required|numeric',
            'h_huacal'  => 'required|numeric',
            'peso' => 'required|numeric',
            'cantidad'  => 'required|numeric',
            'bloqueBase' => 'required|numeric',
            'tablaBase' =>'required|numeric',
            'listonCostados' => 'required|numeric',
            'tablaCostados' =>'required|numeric',
            'puntillaBase' =>'required|numeric',
            'puntillaCostados' =>'required|numeric'
        ];
        if($this->tipoHuacal == 'jaula'){
            $rules = array_merge($rules, [                
                'separacion' => 'required|numeric'
            ]);
        }
        if($this->tipoBase == 'taco'){
            $rules = array_merge($rules, [                
                'listonBase' => 'required|numeric'
            ]);
        }
        return $rules;            
    }
}
