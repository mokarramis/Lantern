<?php

namespace App\Respondors;

use App\Http\Resources\Gold\GoldCollection;
use App\Http\Resources\Gold\GoldResource;

class GoldRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new GoldResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new GoldCollection($data);

    return $this->apiResponse($data, $status);
  }
}