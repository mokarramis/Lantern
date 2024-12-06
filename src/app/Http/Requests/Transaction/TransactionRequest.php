<?php

namespace App\Http\Requests\Transaction;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'transactionable_id' => 'required',
            'category' => 'required|in:' . implode(',', Transaction::CATEGORY),
            'transactionable_type' => 'required|string',
            'time' => 'required|date',
            'description' => 'nullable|string',
            'price' => 'required|integer'
        ];
    }
}
