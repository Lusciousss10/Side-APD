<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminEquipController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\UserEquipController;
use App\Http\Controllers\UserViolationController;
use App\Http\Controllers\manager\ManagerController;
use App\Http\Controllers\ManagerEquipController;
use App\Http\Controllers\ManagerViolationController;
use App\Http\Controllers\ViolationController;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('auth.loginin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// userssssssssss
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('equip', [UserEquipController::class, 'index'])->name('user.equip');
    Route::get('userviolations', [UserViolationController::class, 'index'])->name('user.violations');
    Route::get('userviolations/download/{filename}', [UserViolationController::class, 'download'])->name('user.download');
});

// adminnski
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/equip', [AdminEquipController::class, 'index'])->name('admin.equip');
    Route::get('/admin/violations', [ViolationController::class, 'index'])->name('admin.violations');
    Route::get('/admin/violations/download/{filename}', [ViolationController::class, 'download'])->name('admin.download');
    Route::delete('/admin/violations/{id}', [ViolationController::class, 'destroy'])->name('admin.destroy');
    Route::delete('/admin/violations/delete-all', [ViolationController::class, 'deleteAll'])->name('admin.deleteAll');
    Route::get('/admin/crud', [CRUDController::class, 'index'])->name('admin.crud');
    Route::get('/admin/crud', [CRUDController::class, 'loadAllUsers'])->name('admin.crud');
    Route::get('/admin/add/user', [CRUDController::class, 'loadAllUserForm']);
    Route::post('/admin/add/user', [CRUDController::class, 'AddUser'])->name('AddUser');
    Route::get('/edit/{id}', [CRUDController::class, 'loadEditForm']);
    Route::get('/delete/{id}', [CRUDController::class, 'deleteUser']);
    Route::post('/admin/edit/user', [CRUDController::class, 'EditUser'])->name('EditUser');
});

Route::middleware(['auth', 'managerMiddleware'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/manager/violations', [ManagerViolationController::class, 'index'])->name('manager.violations');
    Route::get('/manager/violations/download/{filename}', [ManagerViolationController::class, 'download'])->name('manager.download');
    Route::delete('/manager/violations/{id}', [ManagerViolationController::class, 'destroy'])->name('manager.destroy');
    Route::delete('/manager/violations/delete-all', [ManagerViolationController::class, 'deleteAll'])->name('manager.deleteAll');
    Route::get('/manager/equip', [ManagerEquipController::class, 'index'])->name('manager.equip');
});


//Route::get('/loginin', function () {
//    return view('auth.loginin');
//});

//Route::get('/cctv', function () {
//    return view('cctv');
//});