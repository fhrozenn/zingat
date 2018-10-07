<?php

namespace App\Http\Middleware;

use App\Http\Response;
use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return (new Response())->unauthorized();
        }
        return $next($request);
    }
}
