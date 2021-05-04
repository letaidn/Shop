<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class AdminLoginMiddleware
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
        if(Session::get('admin')){
            $user = Session::get('admin');
            if($user->RoleID == 1){
                return $next($request);
            }
            else
            {
                return redirect('admin/login');
            }
        }
        else return redirect('admin/login');
    }
}
