<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\panel\manager\EmployeeController;

// ----------------------------------------- Manager Routes -----------------------------------------

Route::prefix('manager')->middleware(['auth', 'manager', 'verified'])->group(function () {

//  ------------------------------------ Employee ------------------------------------

    Route::get('manager_views_employees',[EmployeeController::class,'index'])->name('manager_views_employees');
    Route::get('manager_views_employees/{id}',[EmployeeController::class,'show'])->name('manager_employee.show');

});
