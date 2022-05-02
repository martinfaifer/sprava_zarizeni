<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * success response for frontend
     *
     * @param string $message
     * @param array|object $data
     * @return array
     */
    public function success_response(string $message = "", string|array|object $data = []): array
    {
        return [
            'status' => "success",
            'message' => $message,
            'data' => $data,
        ];
    }

    /**
     * error response for frontend
     *
     * @param string $message
     * @param array $data
     * @return array
     */
    public function error_response(string $message = "", array $data = []): array
    {
        return [
            'status' => "error",
            'message' => $message,
            'data' => $data,
        ];
    }
}
