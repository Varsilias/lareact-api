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
            'name' => 'required|min:3:unique',
            'price' => 'required|min:2|max:10',
            'stock' => 'required|min:1',
            'discount' => 'required|nullable|max:2',
            'description' => 'required|min:10',
        ];
    }
}
