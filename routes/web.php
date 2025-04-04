<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GoodsController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

// Admin panel
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
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

    // Sizes
    Route::controller(SizeController::class)->group(function () {
        Route::delete('/sizes/{size}/delete', 'delete')->name('sizes.delete');
        Route::patch('/sizes/{id}/restore', 'restore')->name('sizes.restore');
        Route::delete('/sizes/destroy', 'destroy')->name('sizes.destroyAll');
    });
    Route::resource('sizes', SizeController::class);

    // Goods
    Route::controller(GoodsController::class)->group(function () {
        Route::delete('/goods/{goods}/delete', 'delete')->name('goods.delete');
        Route::patch('/goods/{id}/restore', 'restore')->name('goods.restore');
        Route::delete('/goods/destroy', 'destroy')->name('goods.destroyAll');
    });
    Route::resource('goods', GoodsController::class)->parameters([
        'goods' => 'goods',
    ]);
});

require __DIR__.'/auth.php';
