<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 🔸 หน้าแรกให้ผู้ใช้ทั่วไปเข้าชมผลงาน
Route::get('/', [ProjectController::class, 'publicIndex'])->name('projects.public');
Route::get('/public-projects/{project}', [ProjectController::class, 'publicShow'])->name('projects.publicshow');

// 🔒 กลุ่ม Route สำหรับ Admin (ต้อง login ก่อน)
Route::middleware(['auth'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::resource('projects', ProjectController::class)->except(['index']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Auth route (login, register, logout)
require __DIR__.'/auth.php';
