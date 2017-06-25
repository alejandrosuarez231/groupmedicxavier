<?php

namespace Cpanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionStoreRequest extends FormRequest
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
            'title'         => 'required',
            'description'   => 'required',
            'type'          => 'required',
            //'category'      => 'required_with:type',
            //'item'          => 'required_with:type,category',
            
        ];
    }

    public function messages()
    {
        return [
            '*.required'                => 'campo obligatorio.'
        ];
    }
}
