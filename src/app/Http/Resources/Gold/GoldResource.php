<?php

namespace App\Http\Resources\Gold;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'carat'          => $this->carat,
            'weight'         => $this->weight,
            'purchase_price' => $this->purchase_price,
            'purchase_time'  => $this->purchase_time,
            'other'          => $this->other
        ];
    }
}
