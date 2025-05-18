<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttendanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request is coming from a valid device
        if (!$this->isValidDevice($request)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
    private function isValidDevice($request)
    {
        // Check for a custom header (e.g., 'X-Device-Identifier')
        $deviceIdentifier = $request->header('X-Device-Identifier');

        // Implement your logic to validate the device identifier -
        // For example, you might compare it with a list of allowed device identifiers

        $allowedDevices = ['arduino_uno_6607ad']; // Replace this array with your valid device identifiers

        return in_array($deviceIdentifier, $allowedDevices);
    }
}
