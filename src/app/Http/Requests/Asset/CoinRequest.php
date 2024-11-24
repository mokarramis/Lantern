<?php

namespace App\Http\Requests\Asset;

use App\Models\Coin;
use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\type;

class CoinRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'type' => 'required|in:'. implode(',', Coin::type), 
            'quantity' => 'required|integer', 
            'purchase_price' => 'required|integer', 
            'purchase_time' => 'nullable|date', 
            'other' => 'nullable|string'
        ];
    }
}
