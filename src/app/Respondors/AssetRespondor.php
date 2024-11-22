<?php

namespace App\Respondors;

use App\Http\Resources\Asset\AssetCollection;
use App\Http\Resources\Asset\AssetResource;

class AssetRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new AssetResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new AssetCollection($data);

    return $this->apiResponse($data, $status);
  }
}