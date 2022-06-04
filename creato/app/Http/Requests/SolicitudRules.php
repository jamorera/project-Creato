<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRules extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $rules = [
            'cliente_id' => 'required|numeric',
            'tipo_de_huacal' => 'required',
            'l_huacal' => 'required|numeric',
            'a_huacal' => 'required|numeric',
            'h_huacal'  => 'required|numeric',
            'peso' => 'required|numeric',
            'cantidad'  => 'required|numeric',
            'separacion' => 'numeric'
        ];
        switch ($this->tipo_de_huacal) {
            case 'madera':
            case 'jaula':
                $rules = array_merge($rules, [
                    'bloque_base' => 'required|numeric',
                    'tabla_base' =>'required|numeric',
                    'liston_costados' => 'required|numeric',
                    'tabla_costados' =>'required|numeric',
                    'puntilla_base' =>'required|numeric',
                    'puntilla_costados' =>'required|numeric'
                ]);
                break;
            case 'triplex':
            case 'carton':
                $rules = array_merge($rules, [
                    'bloque_base' => 'required|numeric',
                    'tabla_base' =>'required|numeric',
                    'liston_costados' => 'required|numeric',
                    'lamina' =>'required|numeric',
                    'puntilla_base' =>'required|numeric',
                    'grapa_costados' =>'required|numeric'
                ]);
                break;
            default:
                return $rules;
        }
        return $rules;
    }
}
