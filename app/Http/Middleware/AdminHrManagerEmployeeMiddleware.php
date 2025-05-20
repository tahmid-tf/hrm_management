<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminHrManagerEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('hr') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('employee')) {
            return $next($request);
        }else{
            abort(403);
        }
    }
}
