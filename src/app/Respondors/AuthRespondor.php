<?php

namespace App\Responors;

use App\Http\Resources\Auth\UserCollection;
use App\Http\Resources\Auth\UserResource;

class AuthRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new UserResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new UserCollection($data);

    return $this->apiResponse($data, $status);
  }
}