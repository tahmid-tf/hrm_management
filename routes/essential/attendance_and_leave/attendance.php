<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

// -------------------- Attendance toggle is in routes/api.php --------------------
// -------------------- Attendance toggle is in routes/api.php --------------------


Route::middleware(['auth', 'admin_hr'])->prefix('attendance')->group(function () {
    Route::get('/attendance_list', [AttendanceController::class, 'index'])->name('attendance_list');
    Route::get('/attendance_edit/{id}', [AttendanceController::class, 'edit'])->name('attendance_edit');
    Route::put('/attendance_update/{id}', [AttendanceController::class, 'update'])->name('attendance_update');
});

// ------------------------------------ Attendance list for manager -----------------------------------

Route::middleware(['auth', 'manager'])->prefix('attendance')->group(function () {
    Route::get('/attendance_list_manager', [AttendanceController::class, 'index'])->name('attendance_list_manager');
});

// ------------------------------------ Attendance list for employee -----------------------------------

Route::middleware(['auth', 'employee'])->prefix('attendance')->group(function () {
    Route::get('/attendance_list_employee', [AttendanceController::class, 'index'])->name('attendance_list_employee');
});

// ------------------------------------ Attendance list export -----------------------------------

Route::middleware(['auth', 'admin_hr_manager_employee'])->get('/attendance_list_export', [AttendanceController::class, 'export'])->name('attendance_list_export');


