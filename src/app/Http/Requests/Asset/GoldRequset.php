<?php

namespace App\Http\Requests\Asset;

use Illuminate\Foundation\Http\FormRequest;

class GoldRequset extends FormRequest
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
            'carat'          => 'required|string',
            'weight'         => 'required|string',
            'purchase_price' => 'required|integer',
            'purchase_time'  => 'nullable|date',
            'other'          => 'nullable|string'
        ];
    }
}
