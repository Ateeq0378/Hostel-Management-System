<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidStudent
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role == 'student'){
            return $next($request);
        }
        else{
            Auth::logout();
            return redirect()->route('login-page')->withErrors(['status' => 'Unauthorized access.']);
        }
    }
}
