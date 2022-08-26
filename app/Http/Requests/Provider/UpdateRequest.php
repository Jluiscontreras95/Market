<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

            'email'=>'required|email|string|unique:providers,email,'.
            $this->route('provider')->id.'|max:255',
            
            'rif_number'=>'required|string|min:7|unique:providers,rif_number,'.
            $this->route('provider')->id.'|max:10',
            
            'address'=>'nullable|string|max:255',
            
            'phone'=>'required|string|min:11|unique:providers,phone,'.
            $this->route('provider')->id.'|max:11',

            'account_bank'=>'required|string| unique:providers,account_bank,'.
            $this->route('provider')->id.'',
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

            'phone.required' =>'Este campo es requerido',
            'phone.string' =>'El valor no es correcto',
            'phone.max' =>'Solo se permiten 11 caracteres',
            'phone.min' =>'Se requiere de 11 caracteres',
            'phone.unique' =>'Ya se encuentra registrado',

            'account_bank.required' => 'Este campo es requerido.',
            'account_bank.string' => 'El valor no es correcto.',
            'account_bank.unique' => 'Ya se encuentra registrado.',
        ];
    }
}
