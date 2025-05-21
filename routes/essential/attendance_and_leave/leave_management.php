<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveRequestController;

// ----------------------------------- Admin, Hr & manager -----------------------------------

Route::middleware(['auth', 'admin_hr_manager_employee'])->prefix('leave')->group(function () {

// ------------------------------- view all leave notices -------------------------------

    Route::resource('leave_notices', LeaveRequestController::class)->except(['edit']);

});
