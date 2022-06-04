<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Madera_laminaRules extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required',
            'largo' => 'required|numeric',
            'ancho' => 'required|numeric',
            'espesor' => 'required|numeric',
            'valor_unitario' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'message' => 'No ha sido posible realizar proceso, por favor verifique e intente nuevamente.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'tipo.required' => 'El campo tipo es obligatorio.',
            'largo.required' => 'El campo largo es obligatorio.',
            'largo.numeric' => 'El campo largo debe ser un numero.',
            'ancho.required' => 'El campo ancho es obligatorio.',
            'ancho.numeric' => 'El campo ancho debe ser un numero.',
            'espesor.required' => 'El campo espesor es obligatorio.',
            'espesor.numeric' => 'El campo espesor debe ser un numero.',
            'valor_unitario.required' => 'El campo valor unitario es obligatorio.',
            'valor_unitario.numeric' => 'El campo valor unitario debe ser un numero.',
        ];
    }
}
