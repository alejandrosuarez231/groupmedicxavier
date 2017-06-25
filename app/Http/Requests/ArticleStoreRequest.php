<?php

namespace Cpanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'description'           => 'required',
            'mercado_publico_id'    => 'required_if:especial,1',
            'price'                 => '',
            'product_maker_id'      => 'required',
            'product_categorie_id'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'description.required'          => 'Debe indicar la descripción.',
            'mercado_publico_id.required'   => 'El codigo de Mercado Publico es obligatorio.',
            'price.numeric'                 => 'Debe indicar un monto numérico.',
            'product_maker_id.required'     => 'Debe indicar un proveedor.',
            'product_categorie_id.required' => 'Debe indicar una categoría.',
        ];
    }
}
