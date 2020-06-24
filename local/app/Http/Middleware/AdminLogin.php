<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLogin
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
               
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->authority==1)
            {
             return $next($request);
            }
            else
            {
                return redirect('admin/login')->with('danger','Bạn không phải là người quản trị');
            }
        }
        else
        {
            return redirect('admin/login');
        }
       
    }
}
