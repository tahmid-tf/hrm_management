<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;

// ----------------------- Notice Routes -----------------------

Route::middleware(['auth','admin_hr'])->prefix('notice')->group(function () {
    Route::resource('notices', NoticeController::class);
});
