<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:150',
            'description_en' => 'required|string|max:500',
            'description_ar' => 'required|string|max:500',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'price' => 'required|numeric|between:0,999999.99',
            'pices_no' => 'required|numeric|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}