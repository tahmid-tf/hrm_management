<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\TaskController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});


// --------------------------------------- Dashboard Redirection ---------------------------------------

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// --------------------------------------- Dashboard Redirection ---------------------------------------

// ---------------------------------- log out ----------------------------------

Route::get('logout_', function () {
    auth()->logout();
    return redirect('/');
})->name('logout_');


Route::get('test', function () {

//    $user = \App\Models\User::whereHas('roles', function ($query) {
//        $query->where('name', 'admin');
//    })->get();

});

// ----------------------------------- Profile update -----------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------------------------------- Auth Routes ---------------------------------------

require __DIR__ . '/auth.php';

// ----------------------------------- Admin Panel Routes -----------------------------------

require __DIR__ . '/admin/admin.php';

// ------------------------------------ HR Panel Routes -------------------------------------

require __DIR__ . '/hr/hr.php';

// ---------------------------------- Manager Panel Routes ----------------------------------

require __DIR__ . '/manager/manager.php';

// --------------------------------- Task Management Routes ----------------------------------

require __DIR__ . '/task_management.php';

// ------------------------------ Attendance Management Routes -------------------------------

require __DIR__ . '/essential/attendance_and_leave/attendance.php';
require __DIR__ . '/essential/attendance_and_leave/leave_management.php';

