<?php

namespace App\Respondors;

use App\Http\Resources\Coin\CoinCollection;
use App\Http\Resources\Coin\CoinResource;

class CoinRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new CoinResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new CoinCollection($data);

    return $this->apiResponse($data, $status);
  }
}