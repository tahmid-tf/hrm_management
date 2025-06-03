<?php

use App\Http\Controllers\ExpenseManagement\ExpenseCategoryController;
use App\Http\Controllers\ExpenseManagement\ExpenseController;
use App\Models\Expense;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin_hr'])->prefix('expense')->group(function () {

// ---------------------------------------- Expense routes ----------------------------------------

    Route::post('expenses_data/bulk_accept', [ExpenseController::class,'bulkAccept'])->name('expenses.bulkAccept');
    Route::post('expenses_data/bulk_reject', [ExpenseController::class,'bulkReject'])->name('expenses.bulkReject');

    Route::resource('expense-categories', ExpenseCategoryController::class);

    Route::get('/expenses_data/export', [ExpenseController::class, 'export'])->name('expenses.export');
});


Route::middleware(['auth', 'admin_hr_manager_employee'])->prefix('expense')->group(function () {
    Route::resource('expenses', ExpenseController::class);
});


// -------------------------------------------- Payroll data for employees --------------------------------------------

Route::middleware(['auth', 'admin_hr_manager'])->group(function () {
    Route::get('/expense_structure_api', [ExpenseController::class, 'expense_structure_api'])->name('expense_structure_api');
});

