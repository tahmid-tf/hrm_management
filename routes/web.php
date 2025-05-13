<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});


// --------------------------------------- Dashboard Redirection ---------------------------------------

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// --------------------------------------- Dashboard Redirection ---------------------------------------

// --------------------------- Spatie test ---------------------------

Route::get('role', function () {

//    $role = Role::create(['name' => 'admin']);
//    $permission = Permission::create(['name' => 'edit articles']);

//    $user = auth()->user();

//    $user->assignRole('admin'); // role
//    $user->givePermissionTo('edit articles'); // permission
//    Role::find(1)->givePermissionTo('edit articles'); // giving permission to roles

//    if ($user->hasRole('admin')) {
//        // allow access
//    }
//
//    if ($user->can('edit articles')) {
//        // allow editing
//    }

});


Route::get('test', function () {
    return view('layouts.template.main');
});

// ----------------------------------- Profile update -----------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------------- Auth Routes -----------------------------------

require __DIR__ . '/auth.php';

// ----------------------------------- Admin Panel Routes -----------------------------------

require __DIR__ . '/admin/admin.php';
