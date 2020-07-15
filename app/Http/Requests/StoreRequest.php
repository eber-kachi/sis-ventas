<?php

namespace App\Http\Requests;

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
        //
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
                'user_id'=>'required',
                'categorie_store_id'=>'required',
                'name'=> 'required|min:3|max:70|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\pL\s])|unique:stores,name',
                'location'=>'required|min:3|max:70|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\pL\s])|',
                'email'=>'required|max:15|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\pL\s])|unique:stores,email',
                'phone'=>'required|min:7|numeric'

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El campo Nombre es obligatorio',
            'name.min'=>'El campo debe tener como minimo 3 caracteres',
            'name.max'=>'El campo debe tener como maximo 70 caracteres',
            'name.regex'=>'Solo letras',
            'name.unique'=>'Esta Tienda ya existe',
            'location.required'=>'El campo Ubicacion es obligatorio',
            'location.min'=>'El campo debe tener como minimo 3 caracteres',
            'location.max'=>'El campo debe tener como maximo 70 caracteres',
            'location.regex'=>'Solo letras y Numeros',
            'email.required'=>'El campo Email es obligatorio',
            'email.max'=>'El campo debe tener como maximo 15 caracteres',
            'email.regex'=>'Solo letras y caracteres especiales (@ y . )',
            'email.unique'=>'Este email ya existe',
            'phone.required'=>'El campo Telefono es obligatorio',
            'phone.min'=>'El campo debe tener como minimo 7 caracteres',
            'phone.numeric'=>'El campo debe tener numeros',
        ];
    }
}
