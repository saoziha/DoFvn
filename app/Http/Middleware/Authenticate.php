<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Request;
class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
     public function handle($request, Closure $next, $guard = null)
     {
         if(Auth::guard($guard)->guest()){
            if($guard=='user'){
                if(strstr(Request::getRequestUri(),'comment')){
                    if ($request->ajax()) {
                        return response('Unauthorized.', 401);
                    }
                }
                return redirect($guard.'/login');;
            }else{
                return redirect($guard.'/login');
            }
         }
         return $next($request);
     }
}
