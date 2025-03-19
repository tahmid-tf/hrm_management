<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('logout_all_devices', [AuthController::class, 'logout_all_devices']);
});

// -------------- Admin Routes

require_once __DIR__ . '/role_routes/admin.php';

// -------------- HR Routes

require_once __DIR__ . '/role_routes/hr.php';

// -------------- Manager Routes

require_once __DIR__ . '/role_routes/manager.php';

// -------------- Employee Routes

require_once __DIR__ . '/role_routes/employee.php';
