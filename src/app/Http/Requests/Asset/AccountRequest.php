<?php

namespace App\Http\Requests\Asset;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'bank' => 'required|string', 
            'name' => 'required|string', 
            'number' => 'required|integer', 
            'card_number' => 'nullable|integer', 
            'amount' => 'required|integer',
            'other' => 'nullable|string'
        ];
    }
}
