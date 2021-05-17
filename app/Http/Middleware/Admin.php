<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Admin
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
        if (!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->role == 'admin'){
            return $next($request);
        }

        if(Auth::user()->role == 'coach'){
            return redirect()->route('coach');
        }

        if(Auth::user()->role == 'user'){
            return redirect()->route('user');
        }
        
    }
}
