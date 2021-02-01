<?php

namespace App\Http\Middleware;

use Closure;

class VipMiddleware
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
        if (auth()->check() && auth()->user()->vip === true)
            return $next($request);
        return redirect('/');
    }
}
