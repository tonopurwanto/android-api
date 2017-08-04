<?php

namespace App\Http\Controllers;

use App\StatusCode;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends ApiController
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return $this->respondUnauthorized('Invalid Credentials', StatusCode::OTHERS);
        }

        return $this->respond(['message' => "Login success"], ['token' => $token]);
    }

    public function register()
    {

    }
}
