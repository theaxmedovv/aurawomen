<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

// Admin Routes - Make sure these are wrapped in middleware
Route::middleware(['web'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Orders
    Route::get('/orders', function() {
        return view('admin.orders');
    })->name('admin.orders');

    // Products (CRUD)
    Route::get('/products', [ProductController::class,'index'])->name('admin.products.index');
    Route::post('/products', [ProductController::class,'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class,'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('admin.products.destroy');
    Route::post('/products/{product}/duplicate', [ProductController::class,'duplicate'])->name('admin.products.duplicate');

    // Categories (CRUD)
    Route::get('/categories', [CategoryController::class,'index'])->name('admin.categories.index');
    Route::post('/categories', [CategoryController::class,'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class,'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('admin.categories.destroy');

    // Telegram Posts
    Route::get('/telegram-posts', function() {
        return view('admin.telegram-posts');
    })->name('admin.telegram-posts');

    // Customers
    Route::get('/customers', function() {
        return view('admin.customers');
    })->name('admin.customers');

    // Analytics
    Route::get('/analytics', function() {
        return view('admin.analytics');
    })->name('admin.analytics');

    // Payments
    Route::get('/payments', function() {
        return view('admin.payments');
    })->name('admin.payments');

    // Notifications
    Route::get('/notifications', function() {
        return view('admin.notifications');
    })->name('admin.notifications');

    // Reviews
    Route::get('/reviews', function() {
        return view('admin.reviews');
    })->name('admin.reviews');

    // Discounts
    Route::get('/discounts', function() {
        return view('admin.discounts');
    })->name('admin.discounts');

    // Delivery
    Route::get('/delivery', function() {
        return view('admin.delivery');
    })->name('admin.delivery');

    // Staff
    Route::get('/staff', function() {
        return view('admin.staff');
    })->name('admin.staff');

    // Settings
    Route::get('/settings', function() {
        return view('admin.settings');
    })->name('admin.settings');

});
