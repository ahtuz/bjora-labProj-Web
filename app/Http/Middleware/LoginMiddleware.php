<?php

namespace Bjora\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if(Auth::check() || $request->hasCookie('user_cookie')){
            return $next($request);
        }
        return redirect()->back();
    }
}