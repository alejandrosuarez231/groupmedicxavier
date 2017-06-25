<?php

namespace Cpanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'campo requerido',
            'email.email' => 'este no es un correo válido',
        ];
    }
}
