<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isLoggedIn
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
        if(!Auth::check())
            return redirect()->route('admin.login.index'); 
            
        return $next($request);
    }
}
