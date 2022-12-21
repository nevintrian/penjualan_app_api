<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionDetailRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'transaction_id' => 'integer|min:1|required',
            'product_id' => 'integer|min:1|required',
            'quantity' => 'integer|min:1|required',
            'subtotal' => 'integer|min:1|required',
        ];
    }
}
