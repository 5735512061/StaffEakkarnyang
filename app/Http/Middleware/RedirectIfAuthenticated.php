<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'header':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('header.home');
              }
              break;

            case 'staff':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('staff.home');
              }
              break;

            default:
              if (Auth::guard($guard)->check()) {
                return redirect()->route('home');
              }
              break;
        }

        return $next($request);
    }
}
