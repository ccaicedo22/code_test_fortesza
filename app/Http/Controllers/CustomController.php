<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class CustomController extends Controller
{
    protected function json(
        int $status,
        bool $error,
        string|bool|int|array|null $response
    ): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'error' => $error,
            'message' => $response
        ], $status);
    }
}