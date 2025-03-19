<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'employee') {
            return $next($request);
        } else {
            return response()->json([
                'response' => 'unauthorized',
                'status' => 404,
                'message' => 'Not an employee account credential',
            ], 404);

        }
    }
}
