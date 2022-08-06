<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            
            'name' => 'string|required|max:255',
            'dni' => 'string|required|unique:clients|min:7|max:8',
            'rif' => 'string|nullable|unique:clients|max:10|min:8',
            'address' => 'string|nullable|max:255|',
            'phone' => 'string|nullable|unique:clients|max:11|min:11',
            'email' => 'string|nullable|email:rfc,dns|unique:clients|max:255|',

        ];
    }
    public function messages()
    {
        return[
            'name.string' => 'El valor no es correcto.',
            'name.required' => 'Este campo es requerido.',
            'name.max' => 'Solo se permite 255 caracteres.',

            
            'dni.string' => 'El valor no es correcto.',
            'dni.required' => 'Este campo es requerido.',
            'dni.unique' => 'Este campo ya está registrado.',
            'dni.max' => 'Solo se permite máximo 8 caracteres.',
            'dni.min' => 'Solo se permite minimo 7 caracteres.',

            'rif.string' => 'El valor no es correcto.',
            'rif.unique' => 'Este campo ya está registrado.',
            'rif.max' => 'Solo se permite máximo 10 caracteres.',
            'rif.min' => 'Solo se permite minimo 8 caracteres.',
            
            
            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo se permite 255 caracteres.',
            
            
            'phone.string' => 'El valor no es correcto.',
            'phone.unique' => 'Este campo ya está registrado.',
            'phone.max' => 'Solo se permite máximo 11 caracteres.',
            'phone.min' => 'Solo se permite minimo 11 caracteres.',

            
            'email.string' => 'El valor no es correcto.',
            'email.unique' => 'Este campo ya está registrado.',
            'email.email' =>'No es un correo electronico',
            'email.max' => 'Solo se permite 11 caracteres.',
            
    
        ];
    }
}
