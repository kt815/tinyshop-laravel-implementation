<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App;

class AfterMiddleware
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

        $response = $next($request);
        return $response;

    }
}
