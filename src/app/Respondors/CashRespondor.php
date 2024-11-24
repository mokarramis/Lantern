<?php

namespace App\Respondors;

use App\Http\Resources\Cash\CashCollection;
use App\Http\Resources\Cash\CashResource;

class CashRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new CashResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new CashCollection($data);

    return $this->apiResponse($data, $status);
  }
}