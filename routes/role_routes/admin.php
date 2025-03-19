<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::get('/test', function () {
        return "test";
    });

});
