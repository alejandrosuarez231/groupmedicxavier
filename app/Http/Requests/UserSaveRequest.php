<?php

namespace Cpanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
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
            'name'          => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
            'description'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'este campo es obligatorio',
            'email.unique' => 'ya fue registrado este correo',
        ];
    }
}
