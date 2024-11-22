<?php

namespace App\Responors;

use Illuminate\Http\JsonResponse;

class BaseRespondor
{
  public function apiResponse($data, $message, $statusCode=200): JsonResponse
  {
    return $this->json([
      'data' => $data,
      'message' => $message,
    ], $statusCode);

  }
}