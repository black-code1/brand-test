<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Arr;

class FormatException
{
    /**
     * @return array<string, array<string, array<mixed>|int|object|string>|int|string|null>
     */
    public static function from(Exception $e): array
    {
        return [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'traces' => Arr::first($e->getTrace()),
        ];
    }
}
