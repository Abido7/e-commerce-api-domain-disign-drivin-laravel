<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Http\Requests\TransformsEnums;
use Spatie\Enum\Laravel\Rules\EnumRule;

class StoreOrderRequest extends FormRequest
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
     * Get the validation rules that applay to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'string|max:255',
            'products' => 'array',
            'products.*.product_id' => 'exists:products,id',
            'products.*.quantity' => 'numeric',
            'products.*.options' => 'array',
            'options.*.attribute_id' => 'exists:attributes,id',
            'options.*.option_id' => 'exists:options,id',
        ];
    }
}