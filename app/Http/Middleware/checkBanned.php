<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class checkBanned
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
        if(auth()->check() && (JWTAuth::user()->status == "INACTIVE")){
            auth()->logout();

            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
