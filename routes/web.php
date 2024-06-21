<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\EnsureUserIsLogin;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware(EnsureUserIsLogin::class);
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->middleware('auth','isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});