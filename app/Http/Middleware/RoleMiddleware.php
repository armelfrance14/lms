<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware 
{

public function handle($request, Closure $next, $role='')
{
    
    if (Auth::user()->role !== 'admin') {
        return redirect('/dashboard'); // Redirect unauthorized users
    }
    return $next($request);
}

}