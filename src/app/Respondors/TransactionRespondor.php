<?php

namespace App\Respondors;

use App\Http\Resources\Transaction\TransactionCollection;
use App\Http\Resources\Transaction\TransactionResource;

class TransactionRespondor extends BaseRespondor
{
  public function respondResource(mixed $data, $status)
  {
    $data = new TransactionResource($data);

    return $this->apiResponse($data, $status);
  }


  public function respondCollection(mixed $data, $status)
  {
    $data = new TransactionCollection($data);

    return $this->apiResponse($data, $status);
  }
}