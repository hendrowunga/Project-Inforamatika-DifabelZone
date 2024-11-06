<?php

namespace App\Http\Requests\cart;

use Illuminate\Foundation\Http\FormRequest;

class cartRequest extends FormRequest
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
            'total_quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'customer_id' => 'required|integer',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'total_quantity.required' => 'Total quantity is required',
    //         'total_quantity.integer' => 'Total quantity must be an integer',
    //         'total_price.required' => 'Total price is required',
    //         'total_price.numeric' => 'Total price must be a number',
    //         'customer_id.required' => 'Customer ID is required',
    //         'customer_id.integer' => 'Customer ID must be an integer',
    //     ];
    // }
}
