<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth()->user();
        
        if(Auth::check())
        {
            if($user->roles == 'admin'){
                return $next($request);
            } 
            if($user->roles == 'user'){
                return redirect()->route('home1');
            }
        }else{
            return redirect()->route('home1');
        }
    }
}
