<?php

namespace App\Respondors;

use App\Http\Resources\Stock\StockCollection;
use App\Http\Resources\Stock\StockResource;

class StockRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new StockResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new StockCollection($data);

    return $this->apiResponse($data, $status);
  }
}