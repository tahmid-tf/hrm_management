<?php

use App\Http\Controllers\ExpenseManagement\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin_hr'])->prefix('expense')->group(function () {

// ---------------------------------------- Expense routes ----------------------------------------
   Route::resource('expense', ExpenseController::class);
});

