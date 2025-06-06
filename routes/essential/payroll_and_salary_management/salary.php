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

    // ---------------- Payroll export ----------------

    Route::get('/payrolls/export', [PayrollController::class, 'export'])->name('payrolls.export');

});


// -------------------------------------------- Manager / employee will also view their payroll data --------------------------------------------

Route::middleware(['auth', 'employee_manager'])->prefix('salary')->group(function () {
    Route::get('/payrolls_data', [PayrollController::class, 'index'])->name('payrolls_data');
    Route::get('/payrolls/{payroll}/payslip_data', [PayrollController::class, 'generatePayslip'])->name('payrolls.payslip_data');
});

// -------------------------------------------- Payroll data for employees --------------------------------------------

Route::middleware(['auth', 'admin_hr_manager'])->group(function () {
    Route::get('/payroll_api', [SalaryStructureController::class, 'salary_structure_api'])->name('payroll_api');
});



