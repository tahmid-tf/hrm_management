<?php

use App\Http\Controllers\ExpenseManagement\ExpenseController;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin_hr'])->prefix('expense')->group(function () {

// ---------------------------------------- Expense routes ----------------------------------------

    Route::resource('expenses', ExpenseController::class);

    Route::post('expenses_data/bulk_accept', [ExpenseController::class,'bulkAccept'])->name('expenses.bulkAccept');
    Route::post('expenses_data/bulk_reject', [ExpenseController::class,'bulkReject'])->name('expenses.bulkReject');
});

