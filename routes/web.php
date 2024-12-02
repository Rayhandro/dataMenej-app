<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CostCenterController;
use App\Http\Controllers\MainDataController;
use App\Http\Controllers\MtaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'LoginForm'])->name('loginform');

Route::get('/register', [AuthController::class, 'RegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:ADMIN'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/mta', [MtaController::class, 'index'])->name('admin.mta');
    Route::post('/admin/mta', [MtaController::class, 'store'])->name('admin.mta.store');
    Route::patch('/admin/mta/{mta}', [MtaController::class, 'update'])->name('admin.mta.update');
    Route::delete('/admin/mta/{mta}', [MtaController::class, 'destroy'])->name('admin.mta.destroy');

    Route::get('/admin/costCenter', [CostCenterController::class, 'index'])->name('admin.costCenter');
    Route::post('/admin/costCenter', [CostCenterController::class, 'store'])->name('admin.costCenter.store');
    Route::patch('/admin/costCenter/{costCenter}', [CostCenterController::class, 'update'])->name('admin.costCenter.update');
    Route::delete('/admin/costCenter/{costCenter}', [CostCenterController::class, 'destroy'])->name('admin.costCenter.destroy');

    Route::get('/user/management', [AdminController::class, 'userManagement'])->name('admin.user');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.user.store');
    Route::patch('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/admin/maindata', [MainDataController::class, 'adminView'])->name('admin.maindata');
    Route::post('/maindata', [MainDataController::class, 'store'])->name('user.maindata.store');
    Route::patch('/maindata/{mainData}', [MainDataController::class, 'update'])->name('user.maindata.update');
    Route::delete('/maindata/{mainData}', [MainDataController::class, 'destroy'])->name('user.maindata.destroy');
});

Route::middleware(['role:USER'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

    Route::get('/maindata', [MainDataController::class, 'userView'])->name('user.maindata');
   

});

