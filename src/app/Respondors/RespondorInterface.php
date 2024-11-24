<?php

namespace App\Respondors;

use Illuminate\Http\JsonResponse;

interface RespondorInterface
{
  public function apiResponse($data, $message, $statusCode=200): JsonResponse;
}