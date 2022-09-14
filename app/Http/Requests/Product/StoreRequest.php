<?php

namespace App\Http\Requests\Product;

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

            'name' => 'string|required|unique:products|max:255',
            'sell_price' => 'required|',
            'measure' => 'required|',
            'category_id' => 'integer|required|',
            // 'provider_id' => 'integer|required|',
            'cost_price' => 'required|',
            'utility' => 'required|',

        ];
    }
    public function messages()
    {
        return[
            'name.string' => 'El valor no es correcto.',
            'name.required' => 'Este campo es requerido.',
            'name.unique' => 'Este campo ya está registrado.',
            'name.max' => 'Solo se permite 255 caracteres.',

            'sell_price.required' => 'Este campo es requerido.',

            'cost_price.required' => 'Este campo es requerido.',          
            
            'utility.required' => 'Este campo es requerido.',
            

            'measure.required' => 'Este campo es requerido.',

            'category_id.required' => 'El valor tiene que ser entero.',
            'category_id.required' => 'Este campo es requerido.',

            'provider_id.required' => 'El valor tiene que ser entero.',
            'provider_id.required' => 'Este campo es requerido.',
        ];
    }
}
