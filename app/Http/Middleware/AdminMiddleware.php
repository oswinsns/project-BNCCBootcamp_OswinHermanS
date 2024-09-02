<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        
        if(Auth::check()) {
            if(Auth::user()-> role != 'admin') {
                return redirect('/userviewtemplate')->with('error', 'Sorry tidak bisa akses data, karena anda bukan admin >:((');;
            }
        } else {
            return redirect('/register');
        }
        return $next($request);
    }
}
