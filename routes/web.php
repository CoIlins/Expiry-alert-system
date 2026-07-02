<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StocksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Dashboard::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [Dashboard::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth', 'role:Vendor'])->group(function () {
    Route::view('/vendor/dashboard', 'vendor.dashboard')->name('vendor.dashboard');
});

Route::middleware(['auth', 'role:Inventory Clerk'])->group(function () {
    Route::get('/clerk/dashboard', [Dashboard::class, 'clerkDashboard'])->name('clerk.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('batches', BatchController::class);
    Route::resource('stocks', StocksController::class);
    Route::get('/reports/inventory', [ReportController::class, 'inventoryReport'])
        ->name('reports.inventory');
});

require __DIR__.'/auth.php';