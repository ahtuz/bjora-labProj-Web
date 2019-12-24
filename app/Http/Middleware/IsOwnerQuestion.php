<?php

namespace Bjora\Http\Middleware;

use Closure;
use Bjora\User;
use Bjora\Question;
use Illuminate\Support\Facades\Auth;

class IsOwnerQuestion
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
        $user = Question::find($request->id)->user_id;

        if(Auth::check()){
            if(Auth::id() === $user){
                return $next($request);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
}
