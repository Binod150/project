<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccessToken
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
        if(!$request->has('access_token')||$request->input('access_token')!=='12345'){
            return redirect('/');
        }
        return $next($request);
    }
}
