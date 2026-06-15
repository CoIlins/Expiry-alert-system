<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Admin'])
    ->group(function () {

        Route::view(
            '/admin/dashboard',
            'admin.dashboard'
        )->name('admin.dashboard');

    });

    Route::middleware(['auth', 'role:Vendor'])
    ->group(function () {

        Route::view(
            '/vendor/dashboard',
            'vendor.dashboard'
        )->name('vendor.dashboard');

    });

    Route::middleware(['auth', 'role:Supplier'])
        ->group(function () {

            Route::view(
                '/supplier/dashboard',
                'supplier.dashboard'
            )->name('supplier.dashboard');

        });
    Route::middleware(['auth', 'role:Inventory Clerk'])
        ->group(function () {

            Route::view(
                '/clerk/dashboard',
                'clerk.dashboard'
            )->name('clerk.dashboard');

        });


require __DIR__.'/auth.php';
