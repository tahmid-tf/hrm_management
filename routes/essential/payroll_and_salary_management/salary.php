<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollAndSalaryManagement\SalaryStructureController;
use App\Http\Controllers\PayrollAndSalaryManagement\SalaryIncrementController;
use App\Http\Controllers\PayrollAndSalaryManagement\PayrollController;

Route::middleware(['auth', 'admin_hr'])->prefix('salary')->group(function () {

    // ------------------ Salary Structure ------------
    Route::resource('salary-structure', SalaryStructureController::class);

    // ------------------ Salary Increment ------------
    Route::resource('salary-increments', SalaryIncrementController::class);

    // ----------------- Payroll management -----------

    Route::resource('payrolls', PayrollController::class)->only(['index', 'create', 'store']);
});
