<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;

/**
 * AuraWomenuz Admin Routes
 *
 * These routes should be included in your main routes/web.php file:
 *
 * In routes/web.php:
 * require __DIR__ . '/admin.php';
 */

// Admin Routes with Authentication Middleware
Route::middleware(['web', 'auth'])->prefix('admin')->group(function () {

    // Main Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Orders Management
    Route::get('/orders', [AdminDashboardController::class, 'orders'])->name('admin.orders');
    Route::put('/orders/{id}/status', [AdminDashboardController::class, 'updateOrderStatus'])->name('admin.orders.update-status');

    // Products Management
    Route::get('/products', [AdminDashboardController::class, 'products'])->name('admin.products');
    Route::delete('/products/{id}', [AdminDashboardController::class, 'deleteProduct'])->name('admin.products.delete');

    // Categories Management
    Route::get('/categories', [AdminDashboardController::class, 'categories'])->name('admin.categories');

    // Telegram Posts
    Route::get('/telegram-posts', [AdminDashboardController::class, 'telegramPosts'])->name('admin.telegram-posts');
    Route::post('/telegram-posts/publish', [AdminDashboardController::class, 'publishToTelegram'])->name('admin.telegram.publish');

    // Customers Management
    Route::get('/customers', [AdminDashboardController::class, 'customers'])->name('admin.customers');
    Route::post('/customers/{id}/contact', [AdminDashboardController::class, 'contactCustomer'])->name('admin.customers.contact');

    // Analytics & Reports
    Route::get('/analytics', [AdminDashboardController::class, 'analytics'])->name('admin.analytics');
    Route::post('/analytics/export', [AdminDashboardController::class, 'exportToCSV'])->name('admin.analytics.export');

    // Payments Management
    Route::get('/payments', [AdminDashboardController::class, 'payments'])->name('admin.payments');

    // Notifications
    Route::get('/notifications', [AdminDashboardController::class, 'notifications'])->name('admin.notifications');

    // Reviews Management
    Route::get('/reviews', [AdminDashboardController::class, 'reviews'])->name('admin.reviews');

    // Discounts & Promo Codes
    Route::get('/discounts', [AdminDashboardController::class, 'discounts'])->name('admin.discounts');

    // Delivery Tracking
    Route::get('/delivery', [AdminDashboardController::class, 'delivery'])->name('admin.delivery');

    // Staff Management
    Route::get('/staff', [AdminDashboardController::class, 'staff'])->name('admin.staff');

    // Settings
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('admin.settings');
    Route::post('/settings/save', [AdminDashboardController::class, 'saveSettings'])->name('admin.settings.save');

});

/**
 * SIMPLE VERSION - If you don't have controllers yet, use this:
 *
 * Just replace the above with this simpler version that returns views directly:
 */

/*
Route::middleware(['web', 'auth'])->prefix('admin')->group(function () {

    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/orders', function() {
        return view('admin.orders');
    })->name('admin.orders');

    Route::get('/products', function() {
        return view('admin.products');
    })->name('admin.products');

    Route::get('/categories', function() {
        return view('admin.categories');
    })->name('admin.categories');

    Route::get('/telegram-posts', function() {
        return view('admin.telegram-posts');
    })->name('admin.telegram-posts');

    Route::get('/customers', function() {
        return view('admin.customers');
    })->name('admin.customers');

    Route::get('/analytics', function() {
        return view('admin.analytics');
    })->name('admin.analytics');

    Route::get('/payments', function() {
        return view('admin.payments');
    })->name('admin.payments');

    Route::get('/notifications', function() {
        return view('admin.notifications');
    })->name('admin.notifications');

    Route::get('/reviews', function() {
        return view('admin.reviews');
    })->name('admin.reviews');

    Route::get('/discounts', function() {
        return view('admin.discounts');
    })->name('admin.discounts');

    Route::get('/delivery', function() {
        return view('admin.delivery');
    })->name('admin.delivery');

    Route::get('/staff', function() {
        return view('admin.staff');
    })->name('admin.staff');

    Route::get('/settings', function() {
        return view('admin.settings');
    })->name('admin.settings');

});
*/
