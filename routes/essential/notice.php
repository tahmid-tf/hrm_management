<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;

// ----------------------- Notice Routes -----------------------

Route::middleware(['auth','admin_hr'])->prefix('notice')->group(function () {
    Route::resource('notices', NoticeController::class);
});

Route::middleware('auth')->prefix('notice')->group(function () {
    Route::get('/public_notices_data', [NoticeController::class, 'publicIndex'])->name('public_notice_data');
});
