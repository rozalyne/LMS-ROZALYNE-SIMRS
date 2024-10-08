<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;

// Rute utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk melihat modul
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');

// Rute untuk mengedit course (admin)
Route::get('/admin/courses/{course}/edit', [AdminController::class, 'editCourse'])->name('admin.courses.edit'); // <-- Tambahkan ini
Route::put('/admin/courses/{course}', [AdminController::class, 'updateCourse'])->name('admin.courses.update'); // Tambahkan rute untuk memperbarui kursus

// Rute untuk menghapus course (admin)
Route::delete('/admin/courses/{course}', [AdminController::class, 'destroyCourse'])->name('admin.courses.destroy'); // <-- Tambahkan ini


// Rute untuk membuat modul
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');

// Rute dashboard dengan pengecekan role menggunakan Auth facade
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role_id === 1) {
        return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
    }
    return view('dashboard'); // Jika bukan admin, tampilkan dashboard user
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk pendaftaran admin (tanpa middleware auth)
Route::get('/admin/create', [AdminController::class, 'createAdmin'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'storeAdmin'])->name('admin.store');

// Middleware untuk memastikan otentikasi
Route::middleware('auth')->group(function () {
    // Rute untuk admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

    // Rute untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk course (admin)
    Route::prefix('admin/courses')->name('admin.courses.')->group(function () {
        Route::get('/', [AdminController::class, 'indexCourses'])->name('index'); // Rute untuk melihat semua course
        Route::get('/create', [AdminController::class, 'createCourse'])->name('create'); // Rute untuk membuat course
        Route::post('/', [AdminController::class, 'storeCourse'])->name('store'); // Rute untuk menyimpan course
    });

    // Rute untuk module (admin)
    Route::prefix('admin/modules')->name('admin.modules.')->group(function () {
        Route::get('/create', [AdminController::class, 'createModule'])->name('create'); // Rute untuk membuat module
        Route::post('/', [AdminController::class, 'storeModule'])->name('store'); // Rute untuk menyimpan module
    });

    // Rute untuk section (admin)
    Route::prefix('admin/sections')->name('admin.sections.')->group(function () {
        Route::get('/create', [AdminController::class, 'createSection'])->name('create'); // Rute untuk membuat section
        Route::post('/', [AdminController::class, 'storeSection'])->name('store'); // Rute untuk menyimpan section
    });
});

// Rute untuk autentikasi
require __DIR__.'/auth.php';
