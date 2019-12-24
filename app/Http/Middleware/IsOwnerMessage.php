<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\User;
use Bjora\Message;
use Illuminate\Support\Facades\Auth;

class IsOwnerMessage
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
        $user = Message::find($request->id)->recipient_id;

        if(Auth::check()){
            if(Auth::id() === $user){
                return $next($request);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
