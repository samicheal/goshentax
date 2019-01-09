<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LoggedIn
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

        //redirect user to login page if not logged in
        if(Auth::check())
            return redirect()->route('dashboard'); 

        return $next($request);    

    }
}
