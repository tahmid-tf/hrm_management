<?php

use App\Http\Controllers\panel\admin\EmployeeController;
use Illuminate\Support\Facades\Route;

// ----------------------------------------- Admin Routes - Employee Management -----------------------------------------

Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::resource('employee', EmployeeController::class);

    Route::get('employee_hold_account', [EmployeeController::class, 'hold_account_index'])->name('employee_hold_account_index');
    Route::delete('employee_hold_account/{id}', [EmployeeController::class, 'hold_account_store'])->name('employee_hold_account_store');
});

// ----------------------------------------- HR Routes - Employee Management -----------------------------------------

Route::prefix('hr')->middleware(['auth', 'hr', 'verified'])->group(function () {
    Route::resource('hr_employee', EmployeeController::class);
});

// ----------------------------------------- Manager Routes - Employee Management -----------------------------------------

Route::prefix('manager')->middleware(['auth', 'manager', 'verified'])->group(function () {
    Route::get('manager_views_employees', [EmployeeController::class, 'index'])->name('manager_views_employees');
    Route::get('manager_views_employees/{id}', [EmployeeController::class, 'show'])->name('manager_employee.show');

});
