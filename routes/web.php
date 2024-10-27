<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Admin panel
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories
    Route::controller(CategoryController::class)->group(function () {
        Route::delete('/categories/{category}/delete', 'delete')->name('categories.delete');
        Route::patch('/categories/{id}/restore', 'restore')->name('categories.restore');
        Route::delete('/categories/destroy', 'destroy')->name('categories.destroyAll');
    });
    Route::resource('categories', CategoryController::class);
});

require __DIR__.'/auth.php';
