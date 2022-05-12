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
            'descripcion' => 'required|string|max:255',
        'tipo_unidad' => 'required|string|max:255',
        'medida' => 'required|number|max:255',
        'proveedor' => 'required|string|max:255',
        'cantidad_tipo_unidad' => 'required|number|max:255',
        'valor_unitario'  => 'required|number|max:255',
        ];
    }

    public function messages()
    {
        return [
            'descripcion' => 'El campo descripcion es obligatorio.',
            'tipo_unidad' => 'El campo tipo de unidad es obligatorio.',
            'medida' => 'El campo medida es obligatorio.',
            'proveedor' => 'El campo proveedor es obligatorio.',
            'cantidad_tipo_unidad'  => 'El campo cantidad de tipo de unidad es obligatorio.',
            'valor_unitario' => 'El campo valor unitario es obligatorio.',
        ];
    }
}
