<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsumoRules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descripcion' => 'required|string|max:200',
            'tipo_unidad' => 'required|string',
            'proveedor' => 'required|string|max:50',
            'cantidad_tipo_unidad' => 'required|numeric|min:5',
            'valor_unitario'  => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'tipo_unidad.required' => 'El campo tipo de unidad es obligatorio.',
            'proveedor.required' => 'El campo proveedor es obligatorio.',
            'cantidad_tipo_unidad.required' => 'El campo cantidad de tipo de unidad es obligatorio.',
            'valor_unitario.required' => 'El campo valor unitario es obligatorio.',
        ];
    }
}
