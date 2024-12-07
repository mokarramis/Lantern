<?php

namespace App\Http\Resources\Stock;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StockCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'items'      => StockResource::collection($this->collection),
            'pagination' => [
                'total'             => $this->total(),
                'count'             => $this->count(),
                'per_page'          => $this->perPage(),
                'current_page'      => $this->currentPage(),
                'total_pages'       => $this->lastPage(),
                'next_Page_Url'     => $this->nextPageUrl(),
                'previous_Page_Url' => $this->previousPageUrl(),
            ],
        ];
    }
}
