<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRules extends FormRequest
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
    public function rules():array
    {
        return [
            'nombre' => 'required|string|max:100',  
            'nit' => 'required|numeric|min:10',
            'direccion' => 'required|string|max:50',            
            'telefono' => 'required|numeric|min:10',
            'correo' => 'required|email|max:40',
            'ciudad' => 'required|string|max:30' 
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nit.required' => 'El campo nit es obligatorio.',
            'direccion.required' => 'El campo direccion es obligatorio.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'correo.required' => 'El campo correo es obligatorio.',
            'ciudad.required' => 'El campo ciudad es obligatorio.',
        ];
    }
}
