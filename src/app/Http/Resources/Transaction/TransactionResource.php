<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\Account\AccountResource;
use App\Http\Resources\Cash\CashResource;
use App\Models\Account;
use App\Models\Cash;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

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
            'transactionable_type' => $this->when($this->relationLoaded('transactionable_type'), function(){
                if ($this->transactionable_type instanceof Account) {
                    return new AccountResource($this->transactionable_type);
                }

                if ($this->transactionable_type instanceof Cash) {
                    return new CashResource($this->transactionable_type);
                }
            }),
            'time' => $this->time,
            'description' => $this->description,
            'price' => $this->price
        ];
    }
}
