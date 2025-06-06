<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\TaskController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return redirect()->route('login');
});


// --------------------------------------- Dashboard Redirection ---------------------------------------

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// --------------------------------------- Dashboard Redirection ---------------------------------------

// ---------------------------------- log out ----------------------------------

Route::get('logout_', [DashboardController::class,'logout'])->name('logout_');

// ----------------------------------- Profile update -----------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------------------------------- Auth Routes ---------------------------------------

require __DIR__ . '/auth.php';

// --------------------------------- Employee Panel Routes ----------------------------------

require __DIR__ . '/essential/employee/employee.php';

// --------------------------------- Task Management Routes ----------------------------------

require __DIR__ . '/essential/task_management/task_management.php';

// ------------------------------ Attendance Management Routes -------------------------------

require __DIR__ . '/essential/attendance_and_leave/attendance.php';
require __DIR__ . '/essential/attendance_and_leave/leave_management.php';

// ------------------------------ Payroll & Salary Management -------------------------------

require __DIR__ . '/essential/payroll_and_salary_management/salary.php';

// ------------------------------- Recruitment Management -----------------------------------

require __DIR__ . '/essential/recruitment/recruitment.php';

// ------------------------------- Expense Management ---------------------------------------

require __DIR__ . '/essential/expense_management/expense_management.php';

// ------------------------------- Notice Management ---------------------------------------

require __DIR__ . '/essential/notice.php';
