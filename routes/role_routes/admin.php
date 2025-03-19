<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::apiResource('employees', \App\Http\Controllers\Employee\ManageEmployeeController::class);

});
