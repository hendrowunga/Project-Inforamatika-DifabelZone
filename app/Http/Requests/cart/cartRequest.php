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
        return auth()->check(); // Pastikan hanya pengguna yang terautentikasi yang dapat membuat keranjang
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|exists:users,id', // Memastikan customer_id ada di users
            'product_id' => 'required|exists:products,id', // Memastikan product_id ada di products
            'status' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'in_stock' => 'required|exists:products,in_stock', // Memastikan product_id ada di products
        ];
    }    
}
