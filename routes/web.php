<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

Route::get('/', [ProjectController::class, 'index'])->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes - protected by is_admin middleware
Route::middleware(['auth', 'verified', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', AdminProjectController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
