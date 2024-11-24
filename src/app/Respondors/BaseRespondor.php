<?php

namespace App\Respondors;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;

class BaseRespondor extends ResponseFactory
{
  public function apiResponse($data, $message, $statusCode=200): JsonResponse
  {
    return $this->json([
      'data' => $data,
      'message' => $message,
    ], $statusCode);

  }
}