<?php

namespace App\Http\Requests\cart;

use Illuminate\Foundation\Http\FormRequest;

class cart_of_productRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|integer',
            'product_id' => 'required|integer',
            'status' => 'required|string',
            'quantity' => 'required|integer',
        ];
    }
}
