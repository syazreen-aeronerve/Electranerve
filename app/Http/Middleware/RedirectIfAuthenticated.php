<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
        if(auth()->user()->role == 'Customer'){
        return redirect()->to('customer-home');
        }
        else if(auth()->user()->role == 'Event Organiser'){
        return redirect()->to('home-organiser');
        }
        }
        
        return $next($request);
    }
}
