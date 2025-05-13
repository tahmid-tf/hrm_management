<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {

// --------------------------------- Employee - Tahmid Ferdous ---------------------------------

    Route::resource('employee',EmployeeController::class);

// --------------------------------- Employee - Tahmid Ferdous ---------------------------------

});
