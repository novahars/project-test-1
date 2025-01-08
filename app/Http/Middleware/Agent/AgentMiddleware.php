<?php

namespace App\Http\Middleware\Agent;

use Closure;
use Auth;

use Illuminate\Http\Request;

class AgentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'agent') {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
} 