<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class JWTAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user) {
            return $next($request);
        }

        
        $errorResponseData = ["message" => "Auth 警告: 沒有權限使用API"];
        throw new HttpResponseException(response()->json($errorResponseData, 422));
    }
}
