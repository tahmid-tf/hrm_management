<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayrollAndSalaryManagement\SalaryStructureController;

Route::middleware(['auth', 'admin_hr'])->prefix('salary')->group(function () {

    // ------------------ Salary Structure ------------
    Route::resource('salary-structure', SalaryStructureController::class);
});
