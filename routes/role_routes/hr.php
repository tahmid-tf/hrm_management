<?php

use Illuminate\Support\Facades\Route;

Route::prefix('hr')->middleware(['auth:sanctum', 'hr'])->group(function () {

    Route::apiResource('employees', \App\Http\Controllers\Employee\ManageEmployeeController::class);

});
