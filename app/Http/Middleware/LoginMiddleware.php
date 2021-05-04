<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('customer')){
            $user = Session::get('customer');
            if($user->RoleID != 1){
                return $next($request);
            }
            else
            {
                return redirect('login');
            }
        }
        else return redirect('login');
    }
}
