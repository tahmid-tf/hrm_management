<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panel\hr\EmployeeController;

Route::prefix('hr')->middleware(['auth', 'hr', 'verified'])->group(function () {

// --------------------------------- Employee - Tahmid Ferdous ---------------------------------

    Route::resource('hr_employee',EmployeeController::class);

// --------------------------------- Employee - Tahmid Ferdous ---------------------------------


});
