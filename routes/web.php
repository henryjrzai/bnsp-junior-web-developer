<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
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
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/employee', [AdminController::class, 'getEmployee'])->name('admin-employee');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('admin-employee-store');
    Route::get('/employee/create', [EmployeeController::class, 'createEmployee'])->name('admin-employee-create');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('admin-employee-delete');
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('admin-employee-update');
    Route::get('/employee/{id}/show', [EmployeeController::class, 'showEmployee'])->name('admin-employee-show');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('admin-employee-update');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('admin-employee-edit');
});