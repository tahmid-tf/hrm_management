<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'hr' => \App\Http\Middleware\HRMiddleware::class,
            'manager' => \App\Http\Middleware\ManagerMiddleware::class,
            'employee' => \App\Http\Middleware\EmployeeMiddleware::class,
            'admin_hr' => \App\Http\Middleware\AdminAndHrMiddleware::class,
            'admin_hr_manager' => \App\Http\Middleware\AdminHrManagerMiddleware::class,
            'admin_hr_manager_employee' => \App\Http\Middleware\AdminHrManagerEmployeeMiddleware::class,
            'employee_manager' => \App\Http\Middleware\EmployeeManagerMiddleware::class,
            'attendance_device_verification' => \App\Http\Middleware\AttendanceMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
