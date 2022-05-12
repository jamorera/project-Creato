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
            'nombre' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',      
            'ciudad' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nit.required' => 'El campo nit es obligatorio.',
            'direccion.required' => 'El campo direccion es obligatorio.',
            'telefono.required' => 'El campo telefono es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'ciudad.required' => 'El campo ciudad es obligatorio.',
        ];
    }
}
