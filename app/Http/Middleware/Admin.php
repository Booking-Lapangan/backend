<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                if ($request->route()->named('dashboard')) {
                    return $next($request); // Already on the dashboard, no need to redirect
                }
                return redirect()->route('dashboard');
            } else {
                if ($request->route()->named('user.dashboard')) {
                    return $next($request); // Already on the login page, no need to redirect
                }
                return redirect()->route('user.dashboard');
            }
        }

        return $next($request); // User is not authenticated, proceed normally
    }
}

