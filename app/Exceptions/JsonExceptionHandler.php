<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class JsonExceptionHandler
{
    /**
     * Render exception.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $request, Exception $exception)
    {
        return response()->json([
            'data' => [
                'message' => 'Error!',
            ],
        ]);
    }
}
