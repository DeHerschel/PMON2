<?php

namespace App\Http\Middleware;
use Exception;;
use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($key = $request->bearerToken()){
            if ($key === config('app.api_key')) {
                return $next($request);
            }
        }
        if ($key = $request->get('api_key')){
            if ($key === config('app.api_key')) {
                return $next($request);
            }
        }
        throw new Exception("Error Processing Request", 1);
    }
}
