<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('clerk.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])
    ->group(function () {

        Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

    });

Route::middleware(['auth', 'role:Vendor'])
    ->group(function () {

        Route::view('/vendor/dashboard', 'vendor.dashboard')->name('vendor.dashboard');

    });



Route::middleware(['auth', 'role:Inventory Clerk'])
        ->group(function () {

            Route::get('/clerk/dashboard', [Dashboard::class, 'clerkDashboard'])->name('clerk.dashboard');
            Route::resource('products', ProductController::class);
            Route::resource('batches', BatchController::class);
            Route::resource('stocks', StockController::class);
            Route::get('/reports/inventory', [ReportController::class, 'inventoryReport'])->name('reports.inventory');

        });

require __DIR__.'/auth.php';
