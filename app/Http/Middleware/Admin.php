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
                    return $next($request); // Already on the dashboard, proceed with the request
                }
                return redirect()->route('dashboard');
            }
        }
        // Handle the case where the user is not authenticated
        return redirect()->route('login');
    }
}

