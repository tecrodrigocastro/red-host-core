<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function success(mixed $data, string $message = "success", int $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }

    public function error(string $message = "error", int $statusCode = 400)
    {
        return response()->json([
            'data'    => null,
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }
}
