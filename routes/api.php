<?php

use App\Http\Controllers\RecruitmentManagement\JobPostingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RecruitmentManagement\ApplicantController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// ----------------------------------- Attendance routes -----------------------------------

Route::middleware('attendance_device_verification')->group(function () {
    Route::post('/attendance/toggle', [AttendanceController::class, 'toggle']);
});

// ---------------------------------- job applications and public apply api routes ----------------------------------

Route::prefix('recruitment')->group(function () {
    Route::get('/job_posts_api/', [JobPostingController::class, 'jobs_api'])->name('job_posts');
    Route::get('/job_posts_api/{id}', [JobPostingController::class, 'jobs_api_single'])->name('job_posts_single');
    Route::post('/apply_for_jobs', [ApplicantController::class, 'apply_for_jobs_api']);
});
