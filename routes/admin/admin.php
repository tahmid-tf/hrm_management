<?php

use App\Http\Controllers\panel\admin\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {

// --------------------------------- Employee - Tahmid Ferdous ---------------------------------

    Route::resource('employee',EmployeeController::class);

// --------------------------------- Employee - Tahmid Ferdous ---------------------------------

});
