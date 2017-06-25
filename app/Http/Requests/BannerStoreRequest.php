<?php

namespace Cpanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
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
            'title'                 => 'required',
            //'title_animation'       => '',
            'description'           => 'required',
            //'description_animation' => '',
            //'img_animation'         => '',
        ];
    }

    public function messages()
    {
        return [
            '*.required'                => 'campo obligatorio.'
        ];
    }
}
