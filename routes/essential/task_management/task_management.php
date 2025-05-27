<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// ---------------------------------------------------------- Kanban board ----------------------------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('/kanban', [TaskController::class, 'index'])->name('kanban.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/tasks/inline-update', [TaskController::class, 'inlineUpdate'])->name('tasks.inlineUpdate');

//    ---------------- restore trashed tasks ----------------

    Route::post('/restore-task/{id}', [TaskController::class, 'restoreTask'])->name('restore-task');

    //    ---------------- delete trashed tasks ----------------

    Route::post('/trash-task/{id}', [TaskController::class, 'trashTask'])->name('trash-task');

    //    ---------------- restore all trashed tasks ----------------

    Route::post('/restore-all-trashed-tasks', [TaskController::class, 'restoreAllTrashedTasks'])->name('restore-all-trashed-tasks');

    //    ---------------- Clear all trashed tasks ----------------

    Route::post('/clear-all-trashed-tasks', [TaskController::class, 'clearAllTrashedTasks'])->name('clear-all-trashed-tasks');

    //    ---------------- Clear all tasks ----------------

    Route::post('/clear-all-tasks', [TaskController::class, 'clearAllTasks'])->name('clear-all-tasks');


});
