<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait AjaxResponse
{
    /**
     * Sends the success response
     */
    public function success(string $message, mixed $data = [], int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return new JsonResponse(['success' => true, 'message' => $message, 'data' => $data], $statusCode);
    }

    /**
     * Sends the error response
     */
    public function error(string $message, int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return new JsonResponse(['success' => false, 'message' => $message], $statusCode);
    }
}
