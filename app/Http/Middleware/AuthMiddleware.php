<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->bearerToken();
            if (!$token) {
                abort(401, "No token is provided!");
            }

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                abort(401, "Token is invalid!");
            }

            return $next($request);
        } catch (JWTException $e) {
            abort(401, "Token might be invalid or expired!");
        }
    }
}
