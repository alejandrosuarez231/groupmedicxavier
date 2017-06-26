<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest
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
            'dia' => 'required',
            'hora_ini' => 'required',
            'hora_fin'=> 'required',
            'cant_pac'=> 'required|numeric',
        ];
    }
     public function messages()
    {
        return [
            '*.required'    => 'este campo es obligatorio',
            '*.filled'      => 'información filled obligatoria',
            '*.email'       => 'email no valido',
        ];
    }
}
