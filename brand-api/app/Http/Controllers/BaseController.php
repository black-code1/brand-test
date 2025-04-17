<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as IlluminateController;

abstract class BaseController extends IlluminateController
{
    protected function errorMessage(string $message, int $status = 400): JsonResponse
    {
        return response()->json(['message' => $message], $status);
    }

    protected function successMessage(string $message, int $status = 200): JsonResponse
    {
        return response()->json(['message' => $message], $status);
    }
}
