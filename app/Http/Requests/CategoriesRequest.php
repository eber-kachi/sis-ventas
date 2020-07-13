<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            //
            'name'=> 'required|min:3|max:25|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\pL\s])|unique:categories,name'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'El campo Nombre es obligatorio',
            'name.min'=>'El campo debe tener como minimo 3 caracteres',
            'name.max'=>'El campo debe tener como maximo 25 caracteres',
            'name.regex'=>'Solo letras',
            'name.unique'=>'Esta Categoria ya existe',

        ];
    }
}
