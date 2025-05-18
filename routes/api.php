<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ----------------------------------- Attendance routes -----------------------------------

Route::middleware('attendance_device_verification')->group(function () {
    Route::post('/attendance/toggle', [AttendanceController::class, 'toggle']);
});

