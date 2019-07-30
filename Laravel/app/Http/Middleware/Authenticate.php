<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('token')) {
            return $next($request);
        } else {
            return redirect('/');
        }

        return $next($request);
    }
}
