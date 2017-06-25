<?php

namespace Cpanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class articlesCategorieStoreRequest extends FormRequest
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
            'categorie' => 'required',
            'description' => '',
        ];
    }

    public function messages()
    {
        return [
            'categorie.required' => 'Indique el nombre de la categoria',
            'description.required' => 'Indique su descripción.'
        ];
    }
}
