<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string|max:255',
            'address' => 'string|max:255',
            'phone' => 'string|max:255',
            'role_id' => 'exists:roles,id',
            'is_active' => 'boolean',
        ];
    }
}