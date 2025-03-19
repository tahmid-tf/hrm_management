<?php

use Illuminate\Support\Facades\Route;

Route::prefix('employee')->middleware(['auth:sanctum', 'employee'])->group(function () {

    Route::get('/test', function () {
        return "test";
    });

});
