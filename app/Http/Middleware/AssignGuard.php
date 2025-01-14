<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AssignGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    public function handle($request, Closure $next, $guard = null)
    {
        // return $next($request);

        if($guard != null)
        auth()->shouldUse($guard);
        return $next($request);
    }
}
