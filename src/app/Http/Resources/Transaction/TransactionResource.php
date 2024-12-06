<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'transactionable_id' => $this->transactionable_id,
            'category' => $this->category,
            'transactionable_type' => $this->transactionable_type,
            'time' => $this->time,
            'description' => $this->description,
            'price' => $this->price
        ];
    }
}
