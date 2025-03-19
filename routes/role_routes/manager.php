<?php

use Illuminate\Support\Facades\Route;

Route::prefix('manager')->middleware(['auth:sanctum', 'manager'])->group(function () {

    Route::get('/test', function () {
        return "test";
    });

});
