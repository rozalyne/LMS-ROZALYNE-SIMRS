<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;


// Authentication Routes
require __DIR__.'/auth.php'; // Ensure this is included for login and register routes

// Main Route
Route::get('/', function () {
    return view('welcome');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        if (Auth::check() && Auth::user()->role_id === 1) {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');

        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store'); // Add this line for storing the new admin

        // Courses
        Route::prefix('courses')->name('admin.courses.')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('index');
            Route::get('/create', [CourseController::class, 'create'])->name('create');
            Route::post('/', [CourseController::class, 'store'])->name('store');
            Route::get('/{course}', [CourseController::class, 'show'])->name('show');
            Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('edit');
            Route::put('/{course}', [CourseController::class, 'update'])->name('update');
            Route::delete('/{course}', [CourseController::class, 'destroy'])->name('destroy');
        });

        // Module Routes
        Route::prefix('courses/{course}/modules')->name('admin.courses.modules.')->group(function () {
            Route::get('/', [ModuleController::class, 'index'])->name('index');
            Route::get('/create', [ModuleController::class, 'create'])->name('create');
            Route::post('/', [ModuleController::class, 'store'])->name('store');
            Route::get('/{module}', [ModuleController::class, 'show'])->name('show');
            Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('edit');
            Route::put('/{module}', [ModuleController::class, 'update'])->name('update');
            Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('destroy');
        });
    });
});

// Logout Route
Route::POST('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
