<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollAndSalaryManagement\SalaryStructureController;
use App\Http\Controllers\PayrollAndSalaryManagement\SalaryIncrementController;
use App\Http\Controllers\PayrollAndSalaryManagement\PayrollController;
use App\Http\Controllers\PayrollAndSalaryManagement\DeductionController;

Route::middleware(['auth', 'admin_hr'])->prefix('salary')->group(function () {

    // ------------------ Salary Structure ------------
    Route::resource('salary-structure', SalaryStructureController::class);

    // ------------------ Salary Increment ------------
    Route::resource('salary-increments', SalaryIncrementController::class);

    // ----------------- Payroll management -----------

    Route::resource('payrolls', PayrollController::class)->only(['index', 'create', 'store']);

    // ---------------- Salary Deduction -----------

    Route::resource('deductions', DeductionController::class);

    // ---------------- Payslip creation ----------------

    Route::get('/payrolls/{payroll}/payslip', [PayrollController::class, 'generatePayslip'])->name('payrolls.payslip');

});
