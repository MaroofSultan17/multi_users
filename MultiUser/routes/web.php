<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');
});

// Teacher
Route::middleware(['auth', 'user-access:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [HomeController::class, 'teacher'])->name('teacher.dashboard');
});

// Student
Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::get('/student/dashboard', [HomeController::class, 'student'])->name('student.dashboard');
});
