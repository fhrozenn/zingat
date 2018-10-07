<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->unauthorized('invalid_credentials');
            }
        } catch (JWTException $e) {
            return $this->response->error('could_not_create_token');
        }

        return $this->response->ok([
            'token' => $token
        ]);
    }
}
