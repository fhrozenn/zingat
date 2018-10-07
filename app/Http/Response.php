<?php

namespace App\Http;

use App\Http\Response\Auth\AuthResponse;

class Response
{

    public function getMeta($status = true, $statusCode = null, $message = null)
    {

        if ($statusCode === null || $statusCode === 0) {

            $statusCode = $status ? 200 : ErrorCodes::SERVER_ERROR;
        } elseif ($status === false && is_numeric($statusCode) && $statusCode > 0) {
            $statusCode = $statusCode * -1;
        }

        if (is_numeric($statusCode) === false && $status === false) {
            $statusCode = ErrorCodes::SERVER_ERROR;
        }

        $user = null;
        if (auth()->user()) {
            $u = auth()->user();
            $user = new AuthResponse($u);
        }

        $meta = [
            'status' => $status,
            'status_code' => $statusCode,
            'message' => $message,
            'user' => $user,
        ];


        return $meta;
    }

    /*
    |--------------------------------------------------------------------------
    | 2xx
    |--------------------------------------------------------------------------
    | Success messages
    |
    */

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function ok($data = [])
    {
        $data = ['_meta' => $this->getMeta()] + (array)$data;

        return response()->json($data, 200, []);
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function accepted($data = [])
    {
        $data = ['_meta' => $this->getMeta()] + (array)$data;


        return response()->json($data, 202);
    }

    /*
    |--------------------------------------------------------------------------
    | 4xx
    |--------------------------------------------------------------------------
    | Client error messages
    |
    */

    /**
     * @param string $message
     * @param int $errorCode
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function badRequest(string $message, $errorCode = ErrorCodes::BAD_REQUEST, $data = [])
    {
        $data = ['_meta' => $this->getMeta(false, $errorCode, $message)] + (array)$data;

        return response()->json($data, 400);
    }

    /**
     * @param string $message
     * @param int $errorCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function unauthorized(string $message = '', $errorCode = ErrorCodes::UNAUTHORIZED)
    {
        $data = ['_meta' => $this->getMeta(false, $errorCode, $message)];

        return response()->json($data, 401);
    }

    /**
     * @param array $data
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbidden($data = [], $message = null)
    {
        $data = ['_meta' => $this->getMeta(false, 403, $message)] + (array)$data;

        return response()->json($data, 403);
    }

    /**
     * @param null $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function notFound($message = null, $code = ErrorCodes::NOT_FOUND)
    {
        $data = ['_meta' => $this->getMeta(false, $code, $message)];

        return response()->json($data, 404);
    }

    /**
     * @param $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function unprocessableEntity($message = null, $code = ErrorCodes::UNPROCESSABLE_ENTITY)
    {
        $data = ['_meta' => $this->getMeta(false, $code, $message)];
        return response()->json($data, 422);
    }



    /*
    |--------------------------------------------------------------------------
    | 5xx
    |--------------------------------------------------------------------------
    | Server-side error messages
    |
    */

    /**
     * Generic errors.
     * @param $message
     * @param $code
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message = null, $code = ErrorCodes::SERVER_ERROR, $data = null)
    {
        $data = ['_meta' => $this->getMeta(false, $code, $message)] + (array)$data;

        return response()->json($data, 500);
    }


}