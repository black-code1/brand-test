<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
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
