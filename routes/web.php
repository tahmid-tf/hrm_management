<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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


// ----------------------------------- Profile update -----------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------------- Auth Routes -----------------------------------

require __DIR__ . '/auth.php';
