<?php

use Illuminate\Support\Facades\Route;

Route::prefix('hr')->middleware(['auth:sanctum', 'hr'])->group(function () {

    Route::get('/test', function () {
        return "test";
    });

});
