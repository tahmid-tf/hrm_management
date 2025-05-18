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

