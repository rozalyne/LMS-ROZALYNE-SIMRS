<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;

Route::get('/courses/{course}/modules/{module}',
 [ModuleController::class,
    'showModule']
  )->name('modules.show');

Route::post('/courses/{course}/modules/{module}/complete',
 [ModuleController::class,
    'completeModule']
 )->name('modules.complete');


Route::get('/', function () {
    return view('modules.show'); // Mengarahkan ke view modules/show.blade.php
});

