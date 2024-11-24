<?php

namespace App\Respondors;

use App\Http\Resources\Account\AccountCollection;
use App\Http\Resources\Account\AccountResource;

class AccountRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new AccountResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new AccountCollection($data);

    return $this->apiResponse($data, $status);
  }
}