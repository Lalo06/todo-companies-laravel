<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'message' => 'Los datos proporcionados no son válidado.',
                    'errores' => $exception->errors(),
                ], 422);
            }
        }
        return parent::render($request, $exception);
    }
}
