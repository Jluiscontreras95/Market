<?php

namespace App\Http\Requests\Provider;

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
            'name'=>'required|string|max:255', 
            'email'=>'required|email|string|max:255|unique:providers',
            'rif_number'=>'required|string|max:10|min:8|unique:providers',
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|max:11|min:11|unique:providers',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 255 caracteres.',

            'email.required' =>'Este campo es requerido',
            'email.email' =>'No es un correo electronico',
            'email.string' =>'El valor no es correcto',
            'email.max' =>'Solo se permiten 255 caracteres',
            'email.unique' =>'Ya se encuentra registrado',

            'rif_number.required' =>'Este campo es requerido',
            'rif_number.string' =>'El valor no es correcto',
            'rif_number.max' =>'Solo se permiten 10 caracteres',
            'rif_number.min' =>'Se requiere de 8 caracteres',
            'rif_number.unique' =>'Ya se encuentra registrado',

            'address.required' =>'Este campo es requerido',
            'address.string' =>'El valor no es correcto',

            'address.required' =>'Este campo es requerido',
            'address.string' =>'El valor no es correcto',
            'address.max' =>'Solo se permiten 11 caracteres',
            'address.min' =>'Se requiere de 11 caracteres',
            'address.unique' =>'Ya se encuentra registrado',
        ];
    }
}
