<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class PrimeiroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('Passou pelo PrimeiroMiddleware Antes');
        $response =  $next($request);
        Log::debug('Passou pelo PrimeiroMiddleware Depois');
        // return $response;
        return response("Alterei a resposta", 404);
    }
}
