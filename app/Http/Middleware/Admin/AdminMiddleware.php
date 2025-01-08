<?php

namespace App\Http\Middleware\Admin;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
       if (!Auth::check() || Auth::user()->role !== 'admin') {
           return redirect()->route('dashboard');
       }

        return $next($request);
    }
} 