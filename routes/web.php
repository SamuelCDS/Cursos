<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/index');
});

Route::get('/about', function () {
    return view('about');
});


Route::middleware('auth', 'admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::get('/users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.force-delete');
    Route::get('/users/{id}/permissions', [UserController::class, 'permissions'])->name('users.permissions');
    Route::post('/users/{id}/permissions', [UserController::class, 'updatePermissions'])->name('users.update-permissions');
    Route::get('/users/{id}/roles', [UserController::class, 'roles'])->name('users.roles');
    Route::post('/users/{id}/roles', [UserController::class, 'updateRoles'])->name('users.update-roles');
    Route::get('/users/{id}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::post('/users/{id}/profile', [UserController::class, 'updateProfile'])->name('users.update-profile');
    Route::get('/users/{id}/profile/edit', [UserController::class, 'editProfile'])->name('users.edit-profile');
    Route::post('/users/{id}/profile/edit', [UserController::class, 'updateProfile'])->name('users.update-profile');
    Route::get('/users/{id}/profile/delete', [UserController::class, 'deleteProfile'])->name('users.delete-profile');
    Route::get('/users/{id}/profile/restore', [UserController::class, 'restoreProfile'])->name('users.restore-profile');
    Route::get('/users/{id}/profile/force-delete', [UserController::class, 'forceDeleteProfile'])->name('users.force-delete-profile');
    Route::get('/users/{id}/profile/permissions', [UserController::class, 'profilePermissions'])->name('users.profile-permissions');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
