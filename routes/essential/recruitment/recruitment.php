<?php

use App\Http\Controllers\RecruitmentManagement\ApplicantController;
use App\Http\Controllers\RecruitmentManagement\JobPostingController;
use Illuminate\Support\Facades\Route;

// ----------------------------- Recruitment routes -----------------------------

Route::middleware(['auth', 'admin_hr'])->prefix('recruitment')->group(function () {

    // Job postings (Admin/HR side)
    Route::resource('job-postings', JobPostingController::class);

    // Applicants (Public or HR side)
    Route::resource('applicants', ApplicantController::class)->only(['index', 'show', 'destroy']);

    // Applicants data export
    Route::get('/applicants_data/export', [ApplicantController::class, 'export'])->name('applicants.export');

    // clear all applicant's data
    Route::get('/applicants_data/clear_all', [ApplicantController::class, 'clearAll'])->name('applicants.clearAll');

});

// ---------------------------------- public routes ----------------------------------

//Route::post('/applicants', [ApplicantController::class, 'store'])->name('applicants.store');
