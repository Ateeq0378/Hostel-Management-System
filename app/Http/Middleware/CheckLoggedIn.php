<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!(Auth::check())){
            return $next($request);
        }
        else if (in_array(Auth::user()->role, ['provost', 'warden'])) {
            return redirect()->route('admin-dashboard');
        }
        else{
            return redirect()->route('student-dashboard');
        }
    }
}
