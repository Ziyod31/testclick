<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:4|max:15',
            'description' => 'required|min:10|max:255',
            'price' => 'required|numeric|min:1|max:9999',
            'photo' => 'mimes:jpeg,jpg,png|max:4999',
        ];
    }
}
