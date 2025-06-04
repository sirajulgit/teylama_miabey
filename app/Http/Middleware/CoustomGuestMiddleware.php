<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CoustomGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check()) {
        //     if (Auth::user()->user_type == 1) {
        //         // ###### | go to admin dashboard page | ######
        //         return redirect()->route('dashboard');
        //     } else {
        //         // ###### | go to user dashboard page | ######
        //         return redirect()->route('user_dashboard');
        //     }
        // } else {
        //     return $next($request);
        // }
         return $next($request);
    }
}
